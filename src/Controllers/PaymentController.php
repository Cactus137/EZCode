<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\Payment;
use App\Models\Course;
use App\Models\Invoice;


class PaymentController extends BaseController
{

    public function checkout($id_course)
    {
        $course = new Course();
        $course = $course->find(['id' => $id_course]);

        // Create orderCode and Check duplicate order code
        $invoice = new Invoice();
        $invoices = $invoice->all();
        do {
            $orderCode = $this->generateRandomOrderCode(10);

            foreach ($invoices as $inv) {
                if ($inv['code_invoice'] == $orderCode) {
                    $existingInvoice = $inv;
                }
            } 
        } while (!empty($existingInvoice));

        $data = [
            'title' => 'Payment',
            'orderCode' => $orderCode,
            'course' => $course,
        ];
        $this->render('shared.checkout', compact('data'));
    }


    public function checkoutHandle()
    {
        // $data = [
        //     'order_code' => $_POST['order_code'],
        //     'transaction_id' => $_POST['transaction_id'],
        //     'status' => 1
        // ];

        // $payment = new Payment();
        // $payment->update($data, $_POST['id']);

        // header('Location: /my-course');
    }

    public function showInvoce($transactionId)
    {

        $this->render('shared.invoice', compact('transactionId'));
    }
}
