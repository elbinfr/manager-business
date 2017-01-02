<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('tipo_documento', ['DNI', 'RUC']);
            $table->string('numero_documento', 20)->unique();
            $table->string('nombre', 100);
            $table->string('direccion', 200);
            $table->string('telefono', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->decimal('saldo_inicial', 10, 3)->default(0.000);
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
