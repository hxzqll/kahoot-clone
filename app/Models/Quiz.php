<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
    ];
    public function user(){
        return $this->BelongsTo(User::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function games(){
        return $this->hasMany(Game::class);
    }
}
