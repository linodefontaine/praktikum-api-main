<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Agar Laravel selalu menyertakan data kategori dan idol saat memanggil produk
    protected $with = ['category', 'idol']; 

    protected $fillable = [
        'name', 
        'price', 
        'stock', 
        'category_id', 
        'idol_id',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function idol()
    {
        return $this->belongsTo(Idol::class);
    }
}