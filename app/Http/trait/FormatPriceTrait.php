<?php

namespace  App\Http\trait;


trait FormatPriceTrait
{
    public function format_price($value){
        return number_format($value,2) . ' EGP';
    }
}
