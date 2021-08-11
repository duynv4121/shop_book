<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'id_user',
        'id_shipping',
        'status',
        'fee_code'
    ];
    public $timestamps = false;
}
