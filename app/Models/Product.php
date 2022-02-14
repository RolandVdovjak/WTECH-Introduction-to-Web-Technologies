<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','price','quantity','type'];

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];


    public function colors(){
        return $this->belongsToMany(Color::class, 'color_product')->withTimestamps();
    }

    public function orders(){
        return $this->belongsToMany(Order::class, 'order_product')->withTimestamps();
    }

    public function hasColor($color){
        if ($this->colors()->where('name', $color)->first()){
            return true;
        }
        return false;
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}
