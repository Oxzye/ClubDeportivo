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
        });
    }

    public function down()
    {
            Schema::dropIfExists('caja');
        
    }
};
