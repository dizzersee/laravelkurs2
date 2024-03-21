<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }

    /**
     * Accessor für den Titel.
     */
    protected function title(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return strtoupper($value);
            },
            set: function ($value) {
                return strtolower($value);
            }
        );
    }
}
