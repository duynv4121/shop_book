<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanHuyen extends Model
{
    protected $table = 'tbl_quanhuyen';
    protected $primaryKey = 'maqh';
    protected $fillable = [
        'maqh',
        'name',
        'type',
        'matp',
    ];
    public $timestamps = false;
}
