<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'user_id', 'categories_id', 'price', 'description', 'slug'
    ];

    protected $hidden = [];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, "product_id", "id");
    }

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "categories_id", "id");
    }
}
