<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    public function users(){
        return  $this->belongsToMany(User::class);
    }
}
