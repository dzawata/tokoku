<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'users_id', 'categories_id', 'proce', 'description', 'slug'
    ];

    protected $hidden = [];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, "products_id", "id");
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
