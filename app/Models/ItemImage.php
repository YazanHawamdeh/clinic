<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
    use HasFactory;

    // protected $table = 'blog_Images';

    // public $incrementing = false;

    // public $timestamps = true;

    // protected $primaryKey = ['blog_id', 'image_url'];

    protected $fillable = ['item_id', 'image_url'];

    // public function blog()
    // {
    //     return $this->belongsTo(Blog::class);
    // }
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    
}
