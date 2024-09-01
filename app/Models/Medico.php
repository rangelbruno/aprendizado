<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $fillable = [
        'name', 'crm', 'especialidade', 'telefone', 'email'
    ];

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}

