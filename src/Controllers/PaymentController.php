<?php

namespace App\Controllers;

use App\Models\PageLayout;
use App\Models\Payment;
use App\Controllers\Controller;

class PaymentController extends Controller
{
    public function checkout($orderCode)
    {
        // $payment = new Payment();
        // $payments = $payment->find([
        //     'order_code' => $orderCode
        // ]);

        // $data = [
        //     'title' => 'Checkout',
        //     'payments' => $payments
        // ];

        view('shared', [
            'content' => PageLayout::shared('checkout'),
            // 'data' => $data
        ]);
    }

    public function showInvoce($transactionId)
    {
        // $payment = new Payment();
        // $payments = $payment->find([
        //     'order_code' => $orderCode
        // ]);

        // $data = [
        //     'title' => 'Invoice',
        //     'payments' => $payments
        // ];

        view('shared', [
            'content' => PageLayout::shared('invoice'),
            // 'data' => $data
            'data' => $transactionId
        ]);
    }
}
