<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    // Atributos que podem ser preenchidos em massa
    protected $fillable = [
        'id',
        'name',
    ];

    // Relacionamento um para um com os detalhes do produto
    public function details()
    {
        return $this->hasOne(ProductDetails::class, 'product_id');
    }

    // Relacionamento um para muitos com os comentarios do produto
    public function reviews()
    {
        return $this->hasMany(ProductReviews::class, 'product_id');
    }
}
