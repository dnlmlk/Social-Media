<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'image_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
    }

    protected function role(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => count(explode('_', $value)) == 2 ? ucfirst(explode('_', $value)[0]) . " " . ucfirst(explode('_', $value)[1]) : ucfirst($value),
        );
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
