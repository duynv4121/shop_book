<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'content',
        'pages',
        'publish_house',
        'date_publish',
        'cove_type',
        'width_height',
        'price',
        'sale_price',
        'image',
        'total',
        'views',
        'url_book',
        'status',
        'id_type',
        'id_author',
        'id_company',
    ];
    public $timestamps = false;
}
