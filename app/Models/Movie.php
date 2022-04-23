<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\MoviesCategory;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'story',  'trailer', 'sort', 'video', 'year', 'poster'];
    public function category()
    {
        return $this->hasMany(MoviesCategory::class, 'movie_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany(MovieComment::class, 'movie_id', 'id');
    }
    public function toArray()
    {
        $attributes = parent::toArray();

        if (isset($attributes['poster'])) $attributes['poster'] = 'http://127.0.0.1:8000' . $attributes['poster'];
        if (isset($attributes['video'])) $attributes['video'] = 'http://127.0.0.1:8000' . $attributes['video'];
        return $attributes;
    }
}
