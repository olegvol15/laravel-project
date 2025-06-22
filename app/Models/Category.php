<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => $image ? $image : asset('images/no-image.jpeg'),
        );
    }

    protected function shortDescription(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => Str::words($attributes['description'], 10, '...'),
        );
    }

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
