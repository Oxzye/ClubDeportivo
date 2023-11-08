<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   /* public function up(): void
    {
        Schema::table('cajas', function (Blueprint $table) {
            $table->integer('id_emp'); // Columna de clave foránea
            $table->foreign('id_emp')->references('id_emp')->on('empleados');
        });
    }

    public function down()
    {
        Schema::table('cajas', function (Blueprint $table) {
            $table->dropForeign(['id_emp']);
            $table->dropColumn('id_emp');
        });
    }*/
};
