<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'content',
        'image_path',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
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
