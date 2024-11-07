<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'childcategory_id',
        // 'category_name',
        'brand_id',
        'product_name',
        'product_code',
        'product_quantity',
        'product_details',
        'product_color',
        'product_size',
        'selling_price',
        'discount_price',
        'video_link',
        'hot_deal',
        'download_on_off',
        'best_rated',
        'main_slider',
        'mid_slider',
        'hot_new',
        'trend',
        'meta_description',
        'availability',
        'product_slug',
        'meta_tag',

        'meta_title',
        'keyword',
        'schema_markup',

        'buyone_getone',
        'image_one',
        'image_two',
        'image_three',
        'image_four',
        'image_five',
        'image_six',
        'product_banner',
        'what_is_the',
        'specification',
        'long_description',
        'status',
        'catalouge',
        'drivers',
        'firmware',
        'manual',

        'product_banner_tag',
        'image_one_tag',
        'image_two_tag',
        'image_three_tag',
        'image_four_tag',
        'image_five_tag',
        'image_six_tag',

    ];
}
