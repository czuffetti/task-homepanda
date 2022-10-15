<?php

/**
 * Dummy web service returning random exchange rates
 *
 */
class CurrencyWebservice
{

    /**
     * return random value here for basic currencies like GBP USD EUR (simulates real API)
     * simple service that generate random numbers to simulate exchange rate base currency is EUR so in case of EUR $rate is 1
     *
     */
    public function getExchangeRate($currency)
    {
        $rate = 0;
        $curr = $this->convertSymbol($currency);
        
        switch($curr) {
            case 'GBP':
                $rate = rand(0.5, 2);
                break;
            case 'USD':
                $rate = rand(1, 2);
                break;
            case 'EUR':
                $rate = 1;
                break;
            default:
                $rate = 1;
                break;
        }
        return $rate;
    }

    /**
     * return currency from given currency symbol
     */
    private function convertSymbol($symbol) {
        $currency = '';
        switch(ord($symbol)) {
            case '194':
                $currency = 'GBP';
                break;
            case '36':
                $currency = 'USD';
                break;
            case '226':
                $currency = 'EUR';
                break;
            default:
                $currency = '';
                break;
        }

        return $currency;
    }
}