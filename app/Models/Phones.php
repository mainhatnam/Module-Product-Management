<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phones extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'price',
        'img',
        'imgs',
        'category_id'
    ];

    public function Category(){
        return $this->belongsTo(category::class);
    }
    public function scopeTakeAndSort($query,$take){
        return $query->take($take)->sortByDesc('id');
     }
}
