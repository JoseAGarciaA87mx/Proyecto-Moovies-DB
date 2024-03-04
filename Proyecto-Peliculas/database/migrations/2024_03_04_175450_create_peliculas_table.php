<?php

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('peli_title', length:255);
            $table->foreignId('director_id')->constrained();
            $table->string('peli_studio', length:255);
            $table->smallInteger('peli_length');
            $table->string('peli_genre', length:255);
            $table->year('peli_year');
            $table->string('peli_country', length:255);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
