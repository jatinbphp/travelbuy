<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponRedemption extends Model
{
    use HasFactory;

    protected $fillable = ['MerchantID', 'product_id', 'product_name', 'product_price', 'coupon_code', 'nappy_code'];
}