<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDetails extends Model
{
    use SoftDeletes;

    // Atributos que podem ser preenchidos em massa
    protected $fillable = [
        'product_id',
        'height',
        'width',
        'depth',
        'value',
    ];

    // Relacionamento muitos para um com o produto
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
