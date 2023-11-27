<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'message', 'file', 'video', 'doc_file', 'audio', 'conversation_id'
      ];
  
      public function conversation(): BelongsTo
      {
          return $this->belongsTo(Conversation::class);
      }
  
      public function message(): HasOne
      {
          return $this->hasOne(Conversation::class, 'conversation_id', 'id');
      }
}
