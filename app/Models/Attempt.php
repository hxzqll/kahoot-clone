<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attempt extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_id',
        'option'
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function player(){
        return $this->belongsTo(Player::class);
    }
}
