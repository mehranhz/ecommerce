<?php


namespace Modules\Cart\Services;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Variety;

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
        $this->cart = collect(json_decode(request()->cookie('cart'),true))?? collect([]);
    }

    /**
     * @param $item
     * @param array|null $data
     * @return $this
     */
    public function put($item, array $data = null)
    {
        if (is_null($data)) {
            $cartItem = $item;
        } else {
            $cartItem = [
                'id' => Str::random(10),
                'title' => $item['product']->title,
                'thumbnail' => $item['product']->thumbnail,
                'quantity' => $data['quantity'],
                'price' => $data['price'] * $data['quantity'],
                'specifications' => $data['specifications'],
                'subject_id' => $item['variety'] ? $item['variety']->id : $item['product']->id,
                'subject_class' => $item['variety'] ? get_class($item['variety']) : get_class($item['product']),
            ];
        }
        $this->cart->put($cartItem['id'], $cartItem);
//        session()->put('cart', $this->cart);
        Cookie::queue('cart',$this->cart->toJson(),60*24*365);
        return $this;
    }

    /**
     * @param $key
     * @return bool
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
     */
    protected function withObject($item)
    {
        if (isset($item['subject_class']) && isset($item['subject_id'])) {
            $object = $item['subject_class']::find($item['subject_id']);
            $item[class_basename($item['subject_class'])] = $object;
            if (class_basename($object) == 'Variety') {
                $item['Product'] = Product::find($object->parent);
            }
        }
        return $item;
    }

    /**
     * @param $key
     * @param $option
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
//            session()->put('cart', $this->cart);
            Cookie::queue('cart',$this->cart->toJson(),60*24*7*4*12);

        }
        return false;
    }

    public function flush(){
        $this->cart = collect([]);
        Cookie::queue('cart',$this->cart->toJson(),60*24*365);
    }
    public function price(){
        $cart = $this->all();
       $price =  $cart->sum(function ($item) {
            $type = isset($item['Variety']) ? 'Variety' : 'Product';
            return ($item[$type]->basePrice - (($item[$type]->basePrice/100)*$item[$type]->discount) )  * $item['quantity'];
        });
        return $price;
    }

}
