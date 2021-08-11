<?php

namespace App\Classes;

class CurrencyConverter
{
    public static function convert(string $sourceCurrency, string $destinationCurrency, float $amount)
    {
        if ($sourceCurrency == $destinationCurrency) {
            return $amount;
        }
        $conversionMultiplier = 1; //Get this data from api
        return $amount * $conversionMultiplier;
    }
}