<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\Conversions\Conversion;

class Message extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  public function sender(): BelongsTo
  {
    return  $this->belongsTo(User::class, 'sender_id');
  }
  
  public function conversation()
  {
    return $this->belongsTo(Conversation::class);
  }
}
