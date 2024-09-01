<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    protected $fillable = [
        'consulta_id', 'data', 'descricao'
    ];

    public function consulta()
    {
        return $this->belongsTo(Consulta::class);
    }
}
