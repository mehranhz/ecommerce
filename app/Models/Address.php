<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\Order;

class Address extends Model
{
    protected $fillable = ['country','province','receiver','city','address','zipcode','phone'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orders(){
        $this->belongsToMany(Order::class);
    }
    use HasFactory;
}
