<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use Modules\Category\Entities\Category;
use Modules\Comment\Entities\Comment;
use Modules\Order\Entities\ReturnRequest;

class Product extends Model
{
    use HasFactory;

    protected
    $fillable = ['title', 'description', 'review', 'thumbnail', 'images', 'basePrice', 'discount', 'inventory', 'user_id', 'specifications'];

    protected
    static function newFactory()
    {
        return \Modules\Product\Database\factories\ProductFactory::new();
    }

    public
    function parent()
    {
        return Product::find($this->product_id);
    }

    public
    function varieties()
    {
        $varieties = Variety::where('parent', $this->id)->get();
        return $varieties;
    }

    public
    function user()
    {
        return $this->belongsTo(User::class);
    }

    public
    function specifications()
    {
        $specifications = array_map(function ($specification) {
            return explode(':', $specification);
        },
            explode("\n", $this->specifications));
        return $specifications;
    }

    public
    function categories()
    {
        return $this->belongsToMany(Category::class,);
    }

    public
    function return_requests()
    {
        return $this->belongsToMany(ReturnRequest::class);
    }

    public
    function price()
    {
        return $this->basePrice - (($this->basePrice / 100) * $this->discount);
    }

    public
    function savedItem()
    {
        if (auth()->user() == null) {
            return false;
        }
        $item = DB::table('user_product')
            ->where('user_id', auth()->user()->id)
            ->where('product_id', $this->id)
            ->where('type', 'save')->first();
        if (!$item) {
            return false;
        }
        return true;
    }

    public
    function hasReminder()
    {
        if (auth()->user() == null) {
            return false;
        }
        $item = DB::table('user_product')
            ->where('user_id', auth()->user()->id)
            ->where('product_id', $this->id)
            ->where('type', 'reminder')->first();
        if (!$item) {
            return false;
        }
        return true;
    }

    public
    function unsetReminder()
    {
        DB::table('user_product')
            ->where('user_id', auth()->user()->id)
            ->where('product_id', $this->id)
            ->where('type', 'reminder')->delete();
    }

    public
    function unlink()
    {
        DB::table('user_product')
            ->where('user_id', auth()->user()->id)
            ->where('product_id', $this->id)
            ->where('type', 'save')->delete();
    }

    public
    function path()
    {
        return route('product.show', $this);
    }

    public
    function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public
    function getClass()
    {
        return get_class($this);
    }
}
