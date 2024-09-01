<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'custo'
    ];

    public function consultas()
    {
        return $this->belongsToMany(Consulta::class, 'consultas_procedimentos');
    }
}

