<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tinh extends Model
{
    protected $table = 'tbl_tinhthanhpho';
    protected $primaryKey = 'matp';
    protected $fillable = [
        'matp',
        'name',
        'type',
    ];
    public $timestamps = false;
}
