<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    protected $fillable = ['dir_name', 'dir_country', 'dir_birthdate'];
    
    protected $dates = ['dir_birthdate', 'created_at', 'updated_at'];

    public function peliculas()
    {
        return $this->hasMany(Pelicula::class);
    }
}
