<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeliculaUser extends Model
{
    use HasFactory;


    protected $table = 'pelicula_user';


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pelicula(){
        return $this->belongsTo(Pelicula::class);
    }

    public function getReview(){
        return $this->review;
    }

    public function getRating(){
        return $this->rating;
    }
}
