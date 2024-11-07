<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'subcategory_name',
        'subcategory_slug',
        'subcategory_img',
        'subcategory_banner',
        'meta_description',
        'meta_tag',
        'subcate_footer_text',
    ];

    public function child_category()
    {
        return $this->hasMany(ChlildCategory::class, 'sub_category_id', 'id');
    }
}
