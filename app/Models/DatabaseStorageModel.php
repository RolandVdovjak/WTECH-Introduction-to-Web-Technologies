<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatabaseStorageModel extends Model
{
    use HasFactory;
    protected $table = 'cart_storage';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'cart_data',
    ];

    public function setCartDataAttribute($value)
    {

        $this->attributes['cart_data'] = base64_encode(serialize($value));
        //dd($this->attributes['cart_data']);
    }

    public function getCartDataAttribute($value)
    {
        //dd($this->attributes['cart_data']);
        return unserialize(base64_decode($value));
    }
}
