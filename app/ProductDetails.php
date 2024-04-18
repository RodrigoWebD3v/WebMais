<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductDetails extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'product_id',
        'height',
        'width',
        'depth',
        'value',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
