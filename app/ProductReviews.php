<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReviews extends Model
{
    protected $fillable = [
        'product_id',
        'comment',
    ];
}
