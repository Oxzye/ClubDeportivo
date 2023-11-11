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
        Schema::table('cajas', function (Blueprint $table) {
            $table->decimal('monto_final', 10, 2);
            $table->timestamps();
            $table->boolean('estado_caja')->default(true);
            $table->Integer('id_emp');

            $table->foreign('id_emp')
                ->references('id_emp')
                ->on('empleados')
                ->onDelete('cascade')
                ->onUpdate('cascade'); // Opcional: Define el comportamiento en cascada al eliminar un empleado
        });
    }

    public function down()
    {
    Schema::table('cajas', function (Blueprint $table) {
        $table->dropForeign(['id_emp']);
        $table->dropColumn('id_emp');
    });
    }
};