<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Banh extends Model
{
    use HasFactory;
    protected $table ='banh';
    protected $primaryKey = 'mabanh';
    public $timestamps = false;
}