<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_name',
        'category_img',
        'category_slug',
        'meta_description',
        'featured_category',
        'meta_tag',
        'meta_title',
        'category_banner_img',
        'category_banner_text',
        'category_footer_text',
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
}
