<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{ 
    use HasFactory,SoftDeletes;

    protected $fillable = ['name', 'nappy_code', 'price', 'status', 'image'];

    public function carts()
    {
        return $this->hasMany(carts::class, 'product_id');
    }
}
