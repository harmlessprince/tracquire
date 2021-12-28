<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Shot extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['description', 'condition', 'user_id', 'post_id'];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function shooter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
