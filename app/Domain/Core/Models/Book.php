<?php

namespace App\Domain\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $hidden = ['book_category_id', 'created_at', 'updated_at'];

    public function bookCategory(){
        return $this->belongsTo(BookCategory::class);
    }
}
