<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChlildCategory extends Model
{
    protected $fillable = [
        'sub_category_id',
        'childcategory_name',
        'childcategory_slug',
        'meta_tag',
        'meta_description',
        'childcategory_img',
    ];
}
