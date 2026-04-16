<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BorrowRecord;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'genre',
        'published_year',
        'quantity',
    ];

    public function borrowRecords()
    {
        return $this->hasMany(BorrowRecord::class, 'book_id');
    }
}