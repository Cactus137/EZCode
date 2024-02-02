<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Payment;

class PaymentController extends BaseController
{
    // public function checkout($orderCode)
    // {
    //     $payment = (new Payment)->find(['order_code' => $orderCode]);
    //     $this->render('shared.checkout', compact('payment'));
    // }

    public function checkout()
    {
        $this->render('shared.checkout');
    }

    public function showInvoce($transactionId)
    {

        $this->render('shared.invoice', compact('transactionId'));
    }
}
