<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'content',
        'pages',
        'price',
        'image'
    ];
    public $timestamps = false;
}
