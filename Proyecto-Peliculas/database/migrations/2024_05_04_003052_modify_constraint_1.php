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

        Schema::table('peliculas', function (Blueprint $table) {
            $table->dropColumn('director_id');
        });

        Schema::table('peliculas', function (Blueprint $table) {
            $table->foreignId('director_id')
                ->default(1) //el default forzosamente debe de ir antes que el constrained
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
