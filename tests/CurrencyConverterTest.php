<?php
require_once('models/CurrencyConverter.php');
use PHPUnit\Framework\TestCase;

final class CurrencyConverterTest extends TestCase
{
    /** @test */
    public function convertSuccessTest() {
        $cc = new CurrencyConverter();
        $conv = $cc->convert('€10');
        $this->AssertSame(10, $conv);
    }

    /** @test */
    public function convertCurrencyInRangeTest() {
        $cc = new CurrencyConverter();
        $conv = $cc->convert('$10');
        $this->AssertLessThanOrEqual(20, $conv);
    }
}