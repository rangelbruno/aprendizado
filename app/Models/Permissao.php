<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Permissao extends Model
{
    use HasRoles;

    protected $table = 'permissions';  // Certifique-se que o nome da tabela está correto

    protected $fillable = ['name', 'guard_name'];  // Permitir atribuição em massa para estes campos
}
