<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Combo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'product_id',
        'first_product_name',
        'first_discount_price',
        'first_selling_price',
        'image_one',
        'status',
   
    ];
    public function product()
    {
        // return $this->belongsTo(Product::class, 'id','product_id');
        // return $this->hasMany(Product::class);
    }
}
