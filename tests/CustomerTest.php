<?php
require_once('models/Customer.php');
use PHPUnit\Framework\TestCase;

final class CustomerTest extends TestCase
{
    /** @test */
    public function CustomerNotExistsTest() {
        $customer = new Customer();

        $c = $customer->getTransactions(3);
        $this->AssertIsArray($c);
        $this->AssertCount(0, $c);
    }

    /** @test */
    public function CustomerExistsTest() {
        $customer = new Customer();

        $c = $customer->getTransactions(1);
        $this->AssertIsArray($c);
        $this->AssertCount(4, $c);
    }
}