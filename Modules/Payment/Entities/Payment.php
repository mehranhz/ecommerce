<?php

namespace Modules\Payment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Order\Entities\Order;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['resnumber','status','trackingcode','price'];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    protected static function newFactory()
    {
        return \Modules\Payment\Database\factories\PaymentFactory::new();
    }
}
