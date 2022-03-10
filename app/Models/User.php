<?php

namespace App\Models;

use App\Enums\SwapType;
use Bavix\Wallet\Traits\HasWallet;
use Laravel\Passport\HasApiTokens;
use Bavix\Wallet\Interfaces\Wallet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use App\Notifications\WelcomeNotification;
use Illuminate\Database\Eloquent\SoftDeletes;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
use App\Notifications\ForgotPasswordNotification;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable implements Wallet
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasWallet, MediaAlly;

    // protected $with = ['wallet'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ForgotPasswordNotification($token));
    }

    public function sendWelcomeNotification()
    {
        $this->notify(new WelcomeNotification());
    }
    public function avatar()
    {
        return  $this->fetchLastMedia()->file_url ?? "";
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function userTransactions()
    {
        return $this->hasMany(Swap::class, 'owner_id');
    }
    public function swaps(): HasMany
    {
        return $this->hasMany(Swap::class, 'receiver_id');
    }
    public function gives(): HasMany
    {
        return $this->hasMany(Swap::class, 'owner_id');
    }

    public function bookmarks(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'bookmarks')->withTimestamps();
    }


    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function shots(): HasMany
    {
        return $this->hasMany(Shot::class);
    }

    public function conversations(): HasMany
    {
        return $this->hasMany(Conversation::class, 'user_id');
    }
    /**
     * A user has a referrer.
     */
    public function referrer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'referrer_id', 'id');
    }

    public function messages()
    {
        //from is the sender_id
        //to is the receiver_id
        return $this->hasMany(Message::class, 'to');
    }


    /**
     * A user has many referrals.
     *
     *
     */
    public function referrers(): HasMany
    {
        return $this->hasMany(User::class, 'referrer_id', 'id');
    }


    //Spatie media method
    // public function registerMediaCollections(): void
    // {
    //     $this->addMediaCollection('avatar')
    //         ->singleFile();
    // }
    //Attributes
    public function setPasswordAttribute($value)
    {
        if (Hash::needsRehash($value)) {
            $value = Hash::make($value);
        }
        $this->attributes['password'] = $value;
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
