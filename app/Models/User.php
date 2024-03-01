<?php

namespace App\Models;

use Arman\LaravelHelper\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, BaseModel;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
        'password' => 'hashed',
    ];

    //------------------------------------------------------------------------------------------------------------------
    //------------------------------------------------ RELATIONS -------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------  Accessors and Mutators ------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------

    public function getAvatarAttribute($value)
    {
        return $this->correctImage(PATH_USER_AVATAR, $value, 'default.jpg');
    }
}
