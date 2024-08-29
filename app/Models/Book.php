<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'book';

    public function author ()
    {
        return $this->belongsTo(Author::class,'author_id');
    }


    public function genre()
    {
        return $this->belongsTo(Genre::class,'genre_id');
    }

    public function loan()
    {
        return $this->hasMany(Loan::class);
    }
}
