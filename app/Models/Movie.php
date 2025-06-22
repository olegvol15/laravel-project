<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Actor;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Movie extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => $image ? $image : asset('images/no-image.jpeg'),
        );
    }
}
