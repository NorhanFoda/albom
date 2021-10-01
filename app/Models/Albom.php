<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albom extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'main_image',
        'price_before',
        'price_after',
        'type',
        'user_id'
    ];

    public function images(){
        return $this->hasMany(Image::class);
    }
}
