<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shot extends Model
{
    use HasFactory, MediaAlly;

    protected $fillable = ['description', 'condition', 'user_id', 'post_id', 'title'];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function shooter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
