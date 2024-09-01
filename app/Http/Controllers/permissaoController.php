<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permissao;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

class permissaoController extends Controller
{
    public function index()
    {
      
        $permissoes = Permissao::all();
        $routeNames = $this->getRouteNames();

        return view('permissao.index', compact('permissoes', 'routeNames'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validação para a criação de uma nova permissão
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name',
            'guard_name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('permissao.index')
                ->withErrors($validator)
                ->withInput();
        }

        Permissao::create($request->all());

        return redirect()->route('permissao.index')->with('success', 'Permissão criada com sucesso!');
    }

    public function update(Request $request, Permissao $permissao)
    {
        // Validação para atualização da permissão
        $validator = Validator::make($request->all(), [
            'name' => ['required', Rule::unique('permissions')->ignore($permissao->id)],
            'guard_name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('permissao.index', $permissao->id)
                ->withErrors($validator)
                ->withInput();
        }

        // Atualiza a permissão após a validação passar
        $permissao->update($request->all());

        // Redireciona para a lista de permissões com uma mensagem de sucesso
        return redirect()->route('permissao.index')->with('success', 'Permissão atualizada com sucesso!');
    }

    public function destroy(Permissao $permissao)
    {
        // Deleta a permissão e redireciona com uma mensagem de sucesso
        $permissao->delete();
        return redirect()->route('permissao.index')->with('success', 'Permissão deletada com sucesso!');
    }
    
    private function getRouteNames()
    {
        $routes = Route::getRoutes();
        $routeNames = [];

        // Obter as rotas já cadastradas como permissões
        $usedRoutes = Permissao::pluck('name')->all(); // Ajuste 'route_name' conforme sua coluna na tabela de permissões

        foreach ($routes as $route) {
            $uri = $route->uri();
            $name = $route->getName();

            // Adicionar apenas as rotas desejadas à lista e que não estão já usadas
            if ($name && in_array($uri, ['/', 'pacientes', 'usuarios', 'regras', 'profile']) && !in_array($name, $usedRoutes)) {
                $routeNames[] = $name;
            }
        }

        return $routeNames;
    }

}
