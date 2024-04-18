<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProductReviews extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'product_id',
        'comment',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
