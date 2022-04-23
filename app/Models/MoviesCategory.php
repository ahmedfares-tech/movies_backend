<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoviesCategory extends Model
{
    use HasFactory;
    protected $fillable = ['movie_id', 'category_id'];
    public function movie()
    {
        return $this->hasOne(Movie::class, 'id', 'movie_id');
    }
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
