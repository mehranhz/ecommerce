<?php


namespace Modules\Cart\Services;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * Class Cart
 * @package Modules\Cart\Services
 * @method static bool has($key)
 * @method static Collection all()
 * @method static array get($key)
 * @method static Cart put(array $item, array $data)
 */
class Cart extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cart';
    }

}
