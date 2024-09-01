### Para exportar para excel:
> composer require maatwebsite/excel
### Para exportar para PDF:
> composer require mpdf/mpdf
> php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider"

### Documentação do RouteHelper.php

**Objetivo:** O `RouteHelper.php` é utilizado para facilitar a verificação de rotas ativas no Laravel, permitindo que a interface do usuário reflita o estado atual da navegação.

**Localização:** O arquivo deve ser colocado em `app/Helpers/RouteHelper.php`.

**Carregamento do Arquivo:**

1. Certifique-se de que o arquivo `RouteHelper.php` é carregado pelo autoloader do Composer. Para isso, adicione o caminho do arquivo ao `composer.json`:

```
"autoload": {
    "files": [
        "app/Helpers/RouteHelper.php"
    ]
}
```


2. Após modificar o `composer.json`, execute `composer dump-autoload` para regenerar o autoloader.

**Funções Disponíveis:**

1. `is_route_active($route)`: Retorna 'active' se a rota atual corresponder ao parâmetro `$route`.
2. `is_routes_active($routes)`: Aceita um array de nomes de rotas e retorna 'active' se a rota atual corresponder a qualquer um dos nomes no array.

**Exemplo de Uso:**

```
`<a class="nav-link {{ is_route_active('dashboard') }}" href="{{ route('dashboard') }}">Dashboard</a>`
```

### Adicionar Novos Links com Ativação no Nav e Header

**1. Adicionar a Rota:**

- Certifique-se de que a rota está definida em `routes/web.php`.
- Dê um nome à rota usando o método `name()`.
- Exemplo:
    
```
Route::get('/new-feature', [FeatureController::class, 'index'])->name('new.feature');
```


**2. Modificar o Header (header.blade.php):**

- Adicione um novo item `<li>` no `<ul>` relevante com a classe apropriada baseada na função `is_routes_active` ou `is_route_active`.
- Exemplo:

```
<li class="nav-item">     <a class="nav-link {{ is_route_active('new.feature') }}" data-bs-toggle="tab" href="#new_feature_tab">New Feature</a> </li>
```

**3. Criar o Conteúdo da Tab Correspondente (nav.blade.php):**

- Adicione um novo painel `<div>` para a tab correspondente, com a classe apropriada baseada na função `is_route_active`.
- Exemplo:

```
<li class="nav-item">
    <a class="nav-link {{ is_route_active('new.feature') }}" data-bs-toggle="tab" href="#new_feature_tab">New Feature</a>
</li>
```

**4. Testar as Alterações:**

- Acesse a rota recém-criada e verifique se a tab correspondente está ativa e o conteúdo é exibido corretamente.

### Considerações Finais

- **Verificação:** Sempre verifique se todas as rotas e links estão funcionando como esperado após as alterações.
- **Documentação:** Mantenha a documentação atualizada sempre que novas funções forem adicionadas ao `RouteHelper.php` ou quando mudanças significativas forem feitas na estrutura de navegação.

Este guia de documentação serve como um recurso valioso para manter a consistência e a compreensão de como a navegação dinâmica é gerenciada na sua aplicação Laravel.