<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Swap extends Model
{
    use HasFactory;
    protected $fillable = ['post_id', 'receiver_id', 'data', 'owner_id', 'type'];

    public function post() {
        return $this->belongsTo(Post::class);
    }
    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
    public function owner(): BelongsTo
    {
         return $this->belongsTo(User::class, 'owner_id');
    }
}
