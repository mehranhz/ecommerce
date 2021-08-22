<?php


namespace Modules\Cart\Services;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Modules\Product\Entities\Product;

class CartService
{
    protected $list = [];
    protected $cart;

    /**
     * CartService constructor.
     */
    public function __construct()
    {
//        $this->cart = session()->get('cart') ?? collect([]);
        // get cart if its set in cookie ; create empty collection if it's not;
        $this->cart = collect(json_decode(request()->cookie('cart'), true)) ?? collect([]);
    }

    /**
     * @param $item
     * @return $this
     * adding item to cart
     */
    public function put(array $item)
    {
        $this->cart->put($item['id'], $item);

        // create or replace cart cookie
        $this->saveCookie(365);
        return $this;
    }

    /**
     * @param $key
     * @return bool
     * gets a product or variety of product and return true if it exists in cart and false if it doesn't
     */
    public function has($key)
    {
        if ($key instanceof Model) {
            return !is_null($this->cart->where('subject_id', $key->id)->where('subject_class', get_class($key))->first());
        }
        return !is_null($this->cart->firstWhere('id', $key));
    }

    /**
     * @param $key
     * @param false $withObject
     * @return mixed
     * takes a cart item id or an object of products or varieties and returns its match item from cart
     */
    public function get($key, $withObject = false)
    {
        $item = $key instanceof Model
            ? $this->cart->where('subject_id', $key->id)->where('subject_class', get_class($key))->first()
            : $this->cart->firstWhere('id', $key);

        return $withObject == true ? $this->withObject($item) : $item;
    }

    /**
     * @return \Illuminate\Support\Collection
     * return all items from cart
     */
    public function all()
    {
        $cart = $this->cart->map(function ($item) {
            return $this->withObject($item);
        });
        return $cart;
    }

    /**
     * @param $item
     * @return mixed
     * gets a cart item and returns it with product and variety attached to it
     */
    protected function withObject($item)
    {
        if (isset($item['subject_class']) && isset($item['subject_id'])) {
            $object = $item['subject_class']::find($item['subject_id']);
            $item[class_basename($item['subject_class'])] = $object;
            if (class_basename($object) !== 'Product') {
                $item['Product'] = Product::find($object->parent);
            }
        }
        return $item;
    }

    /**
     * @param $key
     * @param $option
     * option could be an integer value to simply update item quantity or could be an array to update multiple items in item
     */
    public function update($key, $option)
    {
        $item = collect($this->get($key));
        if (is_numeric($option)) {

            $item = $item->merge([
                'quantity' => $item['quantity'] + $option,
            ]);
        }
        if (is_array($option)) {
            $item = $item->merge($option);
        }
        $this->put($item->toArray());
    }

    /**
     * @param $key
     * @return int|mixed
     */
    public function count($key)
    {
        if (!$this->has($key)) return 0;
        return $this->get($key)['quantity'];
    }

    /**
     * @param $key
     * @return false
     */
    public function delete($key)
    {
        if ($this->has($key)) {
            $this->cart = $this->cart->filter(function ($item) use ($key) {
                if ($key instanceof Model) {
                    return ($item['subject_id' != $key['subject_id']]) && ($item['subject_class'] != get_class($key));
                }
                return $key != $item['id'];
            });
            $this->saveCookie(365);
        }
        return false;
    }

    /*
     * empty cart
     * */
    public function flush()
    {
        $this->cart = collect([]);
        $this->saveCookie(365);
    }


    /**
     * @return mixed
     * cart total price
     */
    public function price($options = null)
    {
        $cart = $this->all();
        $price = $cart->sum(function ($item) {
            return $this->itemPrice($item);
        });
        return $price;
    }


    /**
     * @param $item
     * @return float|int
     * gets a n item and returns it final price
     */
    public function itemPrice($item)
    {
        if ($this->has($item[class_basename($item['subject_class'])])) {
            $object =$item[class_basename($item['subject_class'])];
            $price = $object->price() * $item['quantity'];
            return $price;
        }
        return 0;
    }

    public function itemType($item)
    {
        return class_basename($item['subject_class']);
    }

    public function saveCookie($days){
        Cookie::queue('cart', $this->cart->toJson(), 60 * 24 * $days);

    }

}
