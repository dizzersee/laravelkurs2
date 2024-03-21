<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Post extends Model
{
    use HasFactory;

    public const MAX_TITLE_LENGTH = 100;

    public const MAX_CONTENT_LENGTH = 1000;

    protected $fillable = [
        'title',
        'content',
    ];

    protected static function booted()
    {
        static::creating(function ($post) {

            Log::info("Post wird erstellt: $post->title");

        });

        static::updated(function ($post) {

            Log::info("Post wurde bearbeitet: $post->title");

        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class)->withTimestamps();
    }
}
