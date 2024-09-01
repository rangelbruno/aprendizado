<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UsuarioController extends Controller
{
    public function index()
    {
        $roles = Role::all();  // Carrega todas as roles disponíveis
        $users = User::all();  // Carrega todos os usuários
        return view('usuario.index', compact('roles', 'users'));

    }

    public function assignRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        try {
            $user = User::findOrFail($request->user_id);
            $role = Role::findById($request->role_id);

            $user->assignRole($role->name);

            return response()->json(['message' => 'Role atribuída com sucesso ao usuário!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atribuir role: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'role_id' => 'required|exists:roles,id',
            ]);

            $user = User::findOrFail($validated['user_id']);
            $role = Role::findOrFail($validated['role_id']);

            if ($user->hasRole($role->name)) {
                return response()->json(['message' => 'Usuário já possui essa regra!', 'status' => 'warning'], 200);
            }

            $user->syncRoles([$role->name]);
            return response()->json(['message' => 'Usuário atualizado com sucesso!', 'status' => 'success'], 200);
        } catch (\Exception $e) {
            Log::error('Erro ao atualizar usuário: ' . $e->getMessage());
            return response()->json(['error' => 'Erro ao atualizar o usuário: ' . $e->getMessage()], 500);
        }
    }

    public function export(Request $request)
    {
        $format = $request->input('format');

        switch ($format) {
            case 'excel':
                return Excel::download(new UsersExport, 'users.xlsx');
            case 'pdf':
                return Excel::download(new UsersExport, 'users.pdf', \Maatwebsite\Excel\Excel::MPDF);
            case 'csv':
                return Excel::download(new UsersExport, 'users.csv');
            case 'zip':
                // Implementação de exportação ZIP se necessário
                break;
            default:
                return response()->json(['error' => 'Formato de exportação inválido'], 400);
        }
    }

}