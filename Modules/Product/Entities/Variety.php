<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Variety extends Model
{
    use HasFactory;

    protected $fillable = ['basePrice','discount','inventory','specifications','parent'];
    public function specifications(){
        $specifications = array_map(function ($item){
            return explode(':',$item);
        },explode("\n",$this->specifications));
        return $specifications;
    }
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\VarietyFactory::new();
    }
}
