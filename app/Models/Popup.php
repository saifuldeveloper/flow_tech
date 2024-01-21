<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    use HasFactory;
    protected $fillable = [
        'popup_img',
        'popup_link',
        'meta_tag',
        'meta_description',
        'status',

    ];
}
