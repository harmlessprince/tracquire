<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conversation extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function sender()
    {
        return $this->hasMany(User::class, 'sender_id');
    }
    public function owner()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
