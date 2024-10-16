<?php

namespace App\Models;

use App\Notifications\AuthorResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Author extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'password',
        'title',
        'city',
        'state',
        'zip',
        'dob',
        'bio',
        'status',
        'facebook',
        'twitter',
        'linkedin',
        'approval',
        'balance'
    ];

    /**
     * Send a password reset notification to the user.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AuthorResetPassword($token));
    }

    public static function getSlug($firstname, $lastname)
    {
        $fullname = $firstname .' '. $lastname;
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $fullname)));
        return $slug;
    }

    public function author_parent(): HasOne
    {
        return $this->hasOne(AuthorParent::class);
    }

    public function books() : HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function earnings() : HasMany
    {
        return $this->hasMany(Earning::class);
    }

    public function payouts() : HasMany
    {
        return $this->hasMany(Payout::class);
    }

    public function blogs(): HasMany
    {
        return $this->hasMany(AuthorsBlog::class);
    }
}
