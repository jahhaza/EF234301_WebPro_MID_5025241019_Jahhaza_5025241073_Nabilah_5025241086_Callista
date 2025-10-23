<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'category_id', 
        'image', 'badge', 'full_description', 'features'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'user_favorites')->withTimestamps();
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getDiscountedPriceAttribute()
    {
        return auth()->check() ? auth()->user()->applyDiscount($this->price) : $this->price;
    }

    public function getFormattedDiscountedPriceAttribute()
    {
        return 'Rp ' . number_format($this->discounted_price, 0, ',', '.');
    }

    public function scopeFeatured($query)
    {
        return $query->whereNotNull('badge');
    }

    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    public function isInWishlist()
    {
        return auth()->check() && auth()->user()->favorites()->where('product_id', $this->id)->exists();
    }
}