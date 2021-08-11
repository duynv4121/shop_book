<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    protected $table = 'order_detail';
    protected $primaryKey = 'id';
    protected $fillable = [
        'fee_code',
        'product_id',
        'product_name',
        'product_price',
        'quantity_product',
        'product_coupon',
        'product_feeship'
    ];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\Models\product', 'product_id');
    }
}
