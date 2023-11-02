<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'surface',
        'prix',
        'description',
        'pieces',
        'chambres',
        'etages',
        'adresse',
        'ville',
        'code_postal',
        'images',
        'vendu'
    ];

    public function option(){
        // un bien peut avoir plusieurs options
        return $this->belongsToMany(Option::class);
    }

    public function images() {
        return $this->hasMany(Image::class);
    }
}
