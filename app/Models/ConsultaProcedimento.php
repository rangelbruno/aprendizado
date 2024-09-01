<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ConsultaProcedimento extends Pivot
{
    // Definindo a tabela associada à model
    protected $table = 'consultas_procedimentos';

    // Habilitando timestamps, se você decidir que a tabela pivot deve tê-los
    public $timestamps = true;

    // Colunas que podem ser preenchidas de forma massiva
    protected $fillable = [
        'consulta_id', 'procedimento_id'
    ];

}

