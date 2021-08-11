<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    protected $table = 'coupon';
    protected $primaryKey = 'id';
    protected $fillable = [
        'coupon_name',
        'coupon_code',
        'coupon_time',
        'coupon_number',
        'coupon_condition',
    ];
    public $timestamps = false;
}
