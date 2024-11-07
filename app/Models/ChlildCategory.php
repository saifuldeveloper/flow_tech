<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChlildCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'sub_category_id',
        'category_id',
        'childcategory_name',
        'childcategory_slug',
        'meta_tag',
        'meta_description',
        'childcategory_img',
        'childcategory_banner',
        'child_footer_text'
    ];
}
