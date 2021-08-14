<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Modules\Category\Entities\Category;

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

    public function varieties(){
        $varieties= Variety::where('parent',$this->id)->get();
        return $varieties;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function specifications(){
        $specifications = array_map(function ($specification){
            return explode(':',$specification);
        },
        explode("\n",$this->specifications));
        return $specifications;
    }

    public function categories(){
        return $this->belongsToMany(Category::class,);
    }
}
