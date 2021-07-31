<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','review','thumbnail','images','basePrice','discount','inventory','user_id','specifications'];

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\ProductFactory::new();
    }

    public function parent(){
        return Product::find($this->product_id);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
