<?php

namespace App\Domain\Core\Models;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    public function books(){
        return $this->hasMany(Book::class);
    }
}
