<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    protected $fillable = ['name', 'year_of_creation'];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
