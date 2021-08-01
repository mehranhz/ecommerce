<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Variety extends Model
{
    use HasFactory;

    protected $fillable = ['basePrice','discount','inventory','specifications','parent'];
    public function specifications(){
        return explode("\n",$this->specifications);
    }
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\VarietyFactory::new();
    }
}
