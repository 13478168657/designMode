<?php

namespace strategy;

include_once 'Order.php';

interface PaymentMethod
{
    public function getPaymentForm(Order $order);

    public function validateReturn(Order $order, $data);
}
