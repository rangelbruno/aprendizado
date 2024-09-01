<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class RegrasController extends Controller
{
    public function index()
    {
        // Carrega as roles com suas permissões e conta os usuários associados a cada role
        $roles = Role::with('permissions')->withCount('users')->get();
        $permissions = Permission::all();

        return view('regras.index', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id'
        ]);

        DB::beginTransaction();
        try {
            $role = Role::create(['name' => $validated['name']]);
            $permissionIds = array_map('intval', $validated['permissions']);
            $role->syncPermissions($permissionIds);
            DB::commit();
            return redirect()->route('regras.index')->with('success', 'Regra criada com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Failed to sync permissions:', ['error' => $e->getMessage(), 'permissions' => $permissionIds]);
            return back()->withErrors('Failed to sync permissions: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $role = Role::findById($id);
        if (!$role) {
            return back()->withErrors('Role not found.');
        }

        // Validando os dados recebidos do formulário
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id'
        ]);

        // Atualizando o nome da role
        $role->name = $validated['name'];
        $role->save();

        // Sincronizando as permissões
        if (!empty($validated['permissions'])) {
            $permissionIds = array_map('intval', $validated['permissions']);
            try {
                $role->syncPermissions($permissionIds);
            } catch (\Spatie\Permission\Exceptions\PermissionDoesNotExist $e) {
                Log::error('Failed to sync permissions:', ['error' => $e->getMessage(), 'permissions' => $permissionIds]);
                return back()->withErrors('Failed to sync permissions: ' . $e->getMessage());
            }
        } else {
            // Se não houver permissões enviadas, remova todas as permissões associadas
            $role->syncPermissions([]);
        }

        return redirect()->route('regras.index')->with('success', 'Regra atualizada com sucesso!');
    }

    public function show($id)
    {
        try {
            $role = Role::with(['permissions', 'users'])->find($id);
            $allRoles = Role::all();  // Carrega todas as roles

            if (!$role) {
                return redirect()->route('regras.index')->with('error', 'Regra não encontrada.');
            }

            $permissions = Permission::all();
            $users = User::paginate(10);

            return view('regras.visualizar', compact('role', 'permissions', 'users', 'allRoles'));
        } catch (\Exception $e) {
            Log::error('Error fetching role:', ['error' => $e->getMessage()]);
            return back()->withErrors('Erro ao visualizar a regra: ' . $e->getMessage());
        }
    }

    public function assignPermissions(Request $request, $userId)
    {
        $validated = $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id'
        ]);

        $user = User::find($userId);
        if (!$user) {
            return back()->withErrors('Usuário não encontrado.');
        }

        try {
            $user->syncPermissions($validated['permissions']);
            return back()->with('success', 'Permissões atribuídas com sucesso!');
        } catch (\Exception $e) {
            Log::error('Failed to assign permissions:', ['error' => $e->getMessage()]);
            return back()->withErrors('Erro ao atribuir permissões: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $role = Role::findById($id);

            if ($role) {
                $role->delete();  // Exclui a role do banco de dados
                return redirect()->route('regras.index')->with('success', 'Regra excluída com sucesso!');
            } else {
                return redirect()->route('regras.index')->with('error', 'Regra não encontrada.');
            }
        } catch (\Exception $e) {
            Log::error('Failed to delete role:', ['error' => $e->getMessage()]);
            return back()->withErrors('Erro ao excluir a regra: ' . $e->getMessage());
        }
    }
}
