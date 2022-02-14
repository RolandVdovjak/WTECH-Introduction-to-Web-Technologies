<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['delivery','payment','price', 'name', 'surname', 'city', 'street', 'house_number', 'state', 'zip', 'phone', 'user_id'];

    public function products(){
        return $this->belongsToMany(Product::class, 'order_product')->withTimestamps();
    }

}
