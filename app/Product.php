<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id',
        'name',
    ];
    public function details()
    {
        return $this->hasOne(ProductDetails::class, 'product_id');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReviews::class, 'product_id');
    }

}
