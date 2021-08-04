<?php

namespace Modules\Order\Entities;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Modules\Payment\Entities\Payment;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Variety;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['status','price','tracking_code'];


    public function user(){
        return $this->belongsTo(User::class);
    }
    public function address(){
        return $this->belongsTo(Address::class);
    }
    public function payments(){
        return $this->hasMany(Payment::class);
    }
    public function items(){
        $items = DB::table('item_order')->where('order_id',$this->id)->get()->toArray();
        return array_map((function ($item){
            $item = collect($item)->toArray();
            $variety = $item['item_type'] == 'Variety' ? Variety::find($item['item_id']):null;
            $product_id = $variety== null ? $item['item_id'] : $variety->parent;
            $product = Product::find($product_id);
            unset($item['order_id']);
            unset($item['item_type']);
            return array_merge($item,[
                'Product'=>$product,
                'Variety'=>$variety,
                'price'=> $variety==null?$product->basePrice : $variety->basePrice
            ]);
        }),$items);
    }

    public function totalPrice(){
        return array_sum(array_map(function ($item){
            return $item['price'] * $item['quantity'];
        },$this->items()));
    }
    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\OrderFactory::new();
    }
}
