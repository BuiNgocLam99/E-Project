<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $fillable = [
        'name',
        'logo',
        'information',
        'code',
        'slug',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class, 'brand_id', 'id');
    }
}
