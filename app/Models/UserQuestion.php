<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',

        'question',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
