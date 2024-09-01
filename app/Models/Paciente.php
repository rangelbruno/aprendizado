<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'name', 'birth_date', 'gender', 'cpf', 'cep', 'uf', 'city', 'bairro',
        'address', 'tell_one', 'tell_two', 'email', 'active', 'health_insurance',
        'card_number'
    ];

    protected $table = 'pacientes'; // Garantir que o nome da tabela está correto

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }
}


