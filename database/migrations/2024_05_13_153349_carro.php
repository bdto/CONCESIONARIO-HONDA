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
        //
        Schema::create('carros', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('Marca', 20); 
            $table->integer('Precio'); 
            $table->string('Modelo', 20);
            $table->integer('Año'); 
            $table->string('Vendedor', 20);
            $table->string('Placa', 20); 
        
            $table->bigInteger('id_proveedor')->unsigned(); // Llave foránea
            $table->foreign('id_proveedor')->references('id')->on('proveedores')->onDelete("cascade");
            // Usamos el metodo foreign()
            // Adicional el metodo onDelate
            // Upate y Delate para actualizar o eliminar una fila de proveedores relacionada a carros
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
