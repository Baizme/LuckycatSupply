<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tentukan primary key yang sesuai
    protected $primaryKey = 'id_produk';

    // Tentukan atribut yang dapat diisi
    protected $fillable = [
        'product_name',
        'product_size',
        'promo',
        'price',
        'product_description',
        'product_photo',
        'product_type'
    ];

    // Scope untuk produk promo
    public function scopePromo($query)
    {
        return $query->where('promo', 'yes');
    }
}
