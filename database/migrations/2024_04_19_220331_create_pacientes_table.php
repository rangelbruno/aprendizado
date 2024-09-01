<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birth_date');
            $table->char('gender', 1);
            $table->string('cpf', 11)->unique();
            $table->string('cep', 8)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('city')->nullable();
            $table->string('bairro')->nullable();
            $table->string('address');
            $table->string('tell_one', 15);
            $table->string('tell_two', 15)->nullable();
            $table->string('email')->nullable();
            $table->boolean('active')->default(true);
            $table->string('health_insurance')->nullable();
            $table->string('card_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
