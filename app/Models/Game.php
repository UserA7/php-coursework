<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['name', 'release_year', 'producer_id', 'genre_id'];

    public function producer()
    {
        return $this->belongsTo(Producer::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function image(){
        return $this->hasOne(Image::class);
    }
}
