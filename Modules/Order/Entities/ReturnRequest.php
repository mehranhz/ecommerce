<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product;

class ReturnRequest extends Model
{
    use HasFactory;

    protected $fillable = ['order_id'];

    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\ReturnFactory::new();
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function getStatus()
    {
        switch ($this->status) {
            case 'accepted':
                return 'پذیرفته شد';
                break;
            case 'waiting':
                return 'در انتظار بررسی';
                break;
            case 'rejected':
                return 'رد شد';
                break;
            case 'refunded':
                return ' پرداخت شد';
                break;
            case 'posted':
                return 'ارسال شده';
                break;
            case 'received':
                return ' دریافت شد';
                break;
            case 'outdated':
                return 'زمان درخواست تمام شده';
                break;

        }
    }
}
