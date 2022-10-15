<?php 
require_once('models/Customer.php');
require_once('models/CurrencyConverter.php');
//TODO print formatted report

$customer = new Customer();

$cust = null;

if(sizeof($argv) > 1) {
    $cust = $argv[1];
}

$cc = new CurrencyConverter();

foreach ($customer->getTransactions($cust) as $transaction) {
    echo '| ';
    echo $transaction['customer'];
    echo ' | ';
    echo $transaction['date'];
    echo ' | ';
    echo '€' . $cc->convert($transaction['value']);
    echo ' | ';
    echo PHP_EOL;
}
