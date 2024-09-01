<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
        'paciente_id', 'medico_id', 'data_hora', 'descricao', 'status'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function procedimentos()
    {
        return $this->belongsToMany(Procedimento::class, 'consultas_procedimentos');
    }

    public function receitas()
    {
        return $this->hasMany(Receita::class);
    }
}

