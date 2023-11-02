<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'src_image',
        'bien_id'
    ];

    public function imageUrl() {
        return Storage::disk('public')->url($this->src_image);
    }
}
