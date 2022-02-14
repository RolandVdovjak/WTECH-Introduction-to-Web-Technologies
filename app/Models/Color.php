<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = ['color_id', 'product_id'];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];
    public function products(){
        return $this->belongsToMany(Product::class, 'color_product')->withTimestamps();
    }

}
