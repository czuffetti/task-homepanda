<?php

class Customer
{
    /** 
     * Function get customer params as input if null returns all customers
     * We assume that files has 3 columns in this order customer, date, value
     * We assue that first row contains columns name and we skip it
    */
    public function getTransactions($customer = null)
    {
        $transactions = array();
        $fields  = array(0 => 'customer', 1 => 'date', 2 => 'value');
        $row = 0;
        if (($handle = fopen('data.csv', 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, null, ';')) !== FALSE) {
                if($row == 0) {
                    $row++;
                    continue;
                } else {
                    $num = count($data);
                    if($customer == null || $customer == $data[0]) {
                        $trans = array();
                        for ($c = 0; $c < $num; $c++) {
                            $trans[$fields[$c]] = $data[$c];
                        }
                        $transactions[] = $trans;
                    }
                    $row++;
                }
            }
            fclose($handle);
        }
        return $transactions;
    }
}
