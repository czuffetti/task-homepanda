<?php
require_once('models/CurrencyWebservice.php');
use PHPUnit\Framework\TestCase;

final class CurrencyWebserviceTest extends TestCase
{
    /** @test */
    public function CurrencyNotExistsTest() {
        $cws = new CurrencyWebservice();

        $c = $cws->getExchangeRate('r12');
        $this->AssertIsNumeric($c);
        $this->AssertSame(1, $c);
    }

    /** @test */
    public function CurrencyDollarExistsTest() {
        $cws = new CurrencyWebservice();

        $c = $cws->getExchangeRate('$1');
        $this->AssertIsNumeric($c);
        $this->AssertLessThanOrEqual(2, $c);
    }
}