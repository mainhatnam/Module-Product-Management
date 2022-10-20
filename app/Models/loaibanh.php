<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaibanh extends Model
{
    use HasFactory;
    protected $table ='loaibanh';
    protected $primaryKey = 'maloai';
    public $timestamps = false;
}
