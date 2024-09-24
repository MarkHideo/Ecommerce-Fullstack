<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'material', 'price_normal', 'price_sale', 'description', 'content', 'image', 'images', 'category_id'];


    public function category() {
        return $this->belongsTo(menu::class, 'category_id');
    }
}
