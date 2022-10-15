<?php
require_once('CurrencyWebservice.php');

/**
 * Uses CurrencyWebservice
 * We assume that first char of amount is the currency symbols
 * We call webservice to get exchange rate and then multiply to amount to get result
 *
 */
class CurrencyConverter
{    
    public function convert($amount)
    {
        $cws = new CurrencyWebservice();
        $currency = substr($amount, 0, 1);
        $value = preg_replace('/[^0-9.]/', '', $amount);

        $rate = $cws->getExchangeRate($currency);

        $result = $value * $rate;

        return $result;
    }
}