<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // public function images()
    // {
    //     return $this->hasMany(ItemImage::class);
    // }

    
    public function item()
{
    return $this->belongsTo(Item::class);
}

public function order()
{
    return $this->belongsTo(Order::class);
}
// Item.php
public function images() {
    return $this->hasMany(ItemImage::class, 'item_id');
}

    // In the Item model
protected $fillable = ['image_url', 'name', 'price', 'points'];


//     public function categories()
//     {
//         return $this->hasMany(BlogCategory::class);
//     }
//     public function categories2()
//     {
//         return $this->belongsToMany(Category::class,'blog_categories');
//     }
//     public function categoriesEdit()
// {
//     return $this->belongsToMany(Category::class);
// }


}
