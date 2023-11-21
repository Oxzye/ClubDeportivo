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
        Schema::table('tipos_detalle_factura', function (Blueprint $table) {
            $table->decimal('precio_tdf', 10,2);
        });
        // Schema::table('tipos_detalle_factura', function (Blueprint $table) {
        //     $table->dropTimestamps(); // Esto eliminará las columnas 'created_at' y 'updated_at'
        // });

        // Schema::table('tipos_detalle_factura', function (Blueprint $table) {

        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
