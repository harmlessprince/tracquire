<?php

namespace App\Models;

use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Musonza\Chat\Models\Message as ModelsMessage;
use Spatie\MediaLibrary\Conversions\Conversion;

class Message extends ModelsMessage
{
  use MediaAlly;

   /**
     * Get the post's image.
     */
    public function attachment()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
  // use HasFactory, SoftDeletes;
  // protected $guarded = [];

  // public function sender(): BelongsTo
  // {
  //   return  $this->belongsTo(User::class, 'sender_id');
  // }
  
  // public function conversation()
  // {
  //   return $this->belongsTo(Conversation::class);
  // }
}
