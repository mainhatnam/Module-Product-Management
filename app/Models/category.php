<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'category';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'slug'
    ];
    public function phones(){
        return $this->hasMany(Phones::class);
    }
}
