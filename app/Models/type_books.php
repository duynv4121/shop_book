<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_books extends Model
{
    protected $table = 'type_books';
    protected $primaryKey = 'id';
    protected $fillable = ['id, name, url_name, AnHien'];
    public $timestamps = false;
}
