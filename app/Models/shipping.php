<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    protected $table = 'shipping';
    protected $primaryKey = 'id';
    protected $fillable = [
        'shipping_name',
        'address',
        'phone',
        'email',
        'method',
        'note',
    ];
    public $timestamps = false;
}
