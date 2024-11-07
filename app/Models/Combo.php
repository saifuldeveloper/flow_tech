<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Combo extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_product_id',
        'sub_product_id',
        'status',

    ];
    public function product()
    {
        // return $this->belongsTo(Product::class, 'id','product_id');
        // return $this->hasMany(Product::class);
    }
}
