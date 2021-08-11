<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XaPhuong extends Model
{
    protected $table = 'tbl_xaphuongthitran';
    protected $primaryKey = 'xaid';
    protected $fillable = [
        'maqh',
        'name',
        'type',
        'maqh',
    ];
    public $timestamps = false;
}
