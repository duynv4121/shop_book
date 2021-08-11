<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feeShip extends Model
{
    protected $table = 'fee_ship';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'fee_matp',
        'fee_maqh',
        'fee_xa',
        'phi_ship',
    ];
    public $timestamps = false;


    public function city()
    {
            return $this->belongsTo('App\Models\Tinh', 'fee_matp');
    }

    public function QuanHuyen()
    {
            return $this->belongsTo('App\Models\QuanHuyen', 'fee_maqh');
    }

    public function XaPhuong()
    {
            return $this->belongsTo('App\Models\XaPhuong', 'fee_xa');
    }
}
