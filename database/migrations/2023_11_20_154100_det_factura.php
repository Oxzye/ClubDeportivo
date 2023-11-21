<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Decimal;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('detalles_factura', function (Blueprint $table) {
            $table->decimal('precio_df', 10,2);
            // $table->foreign('num_fac')
            //     ->references('num_fac')
            //     ->on('facturas')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');
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
