<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title','serial','tags','parent','user'];

    protected static function newFactory()
    {
        return \Modules\Category\Database\factories\CategoryFactory::new();
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function childsProduct(){
        $products=collect([]);
//        dd($this->childs());
//        die();
        foreach ($this->childs() as $child){
            $products=$products->toBase()->merge($child->products);
        }
        return $products;
    }

    public function childs(){
        return Category::where('serial' ,'like',$this->serial.'%')->with('products')->get();

    }

    public function child(){
        return $this->hasMany(Category::class,'parent','id');
    }

    public function parentCategory(){
        return $this->belongsTo(Category::class,'parent','id');
    }
}
