<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    // Relación opcional con productos
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
