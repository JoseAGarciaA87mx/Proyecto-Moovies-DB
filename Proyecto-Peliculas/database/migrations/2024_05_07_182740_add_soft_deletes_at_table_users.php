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
        //me equivoqué, en una migracion anterior y tengo que borrar primero esta columna antes
        //de implementar el borrado logico correctamente
        //Schema::table('users', function (Blueprint $table) {
        //    $table->dropColumn('deleted_at'); //me equivoqué, en una migracion anterior y tengo que borrar primero esta columna antes de implementar
        //});

        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
