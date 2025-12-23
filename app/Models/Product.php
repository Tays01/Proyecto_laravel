<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nombre', 'precio', 'stock', 'category_id'];

    // Relación opcional con categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
