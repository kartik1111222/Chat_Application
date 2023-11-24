<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
      'id', 'from_user_id', 'to_user_id'
    ];

    public function message(): HasOne
    {
        return $this->hasOne(Message::class, 'conversation_id', 'id');

    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // public function conversation(): BelongsTo
    // {
    //     return $this->belongsTo(Message::class);
    // }
}
