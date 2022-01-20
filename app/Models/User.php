<?php

namespace App\Models;

use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Interfaces\Wallet;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Laravel\Passport\HasApiTokens;
use Musonza\Chat\Traits\Messageable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\WelcomeNotification;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ForgotPasswordNotification;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements HasMedia, Wallet
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, InteractsWithMedia, HasWallet;

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

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
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
    /**
     * A user has a referrer.
     */
    public function referrer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'referrer_id', 'id');
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

//    public function transactions(): HasMany
//    {
//        return $this->hasMany(Transaction::class);
//    }

//    public function wallet(): HasOne
//    {
//        return $this->hasOne(Wallet::class);
//    }

    //Spatie media method
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->singleFile();
    }
    //Attributes
    public function setPasswordAttribute($value)
    {
        if( Hash::needsRehash($value) ) {
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
