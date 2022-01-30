<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'pin',
        'start'
        
    ];
    public function players(){
        return $this->hasMany(Player::class);
    }
    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }
}
