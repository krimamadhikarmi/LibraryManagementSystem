<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author_name',
        'price',
        'description',
        'category_id',
        'quantity',
        'book_img'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}


