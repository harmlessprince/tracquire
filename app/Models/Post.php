<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends CustomModel
{
    use SoftDeletes;

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function shots (): HasMany{
        return $this->hasMany(Shot::class);
    }
    /**
     * Get all the post's comments.
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public  function category (): BelongsTo{
        return $this->belongsTo(Category::class);
    }
}
