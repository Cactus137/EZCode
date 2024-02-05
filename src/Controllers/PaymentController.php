<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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


    public function checkoutHandle($orderCode)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $invoice = new Invoice();
            $dataAddInvoice = [
                'code_invoice' => $orderCode,
                'id_account' => $_POST['id_account'],
                'email' => $_POST['email'],
                'id_course' => $_POST['id_course'],
                'issue_date' => date('Y-m-d H:i:s'),
                'total_price' => $_POST['total_price'],
            ]; 

            $invoice->create($dataAddInvoice);
            header('Location: /invoice/' . $orderCode);
        }
    }

    public function showInvoce($orderCode)
    {
        $invoice = new Invoice();
        $dataInvoice = $invoice->find(['code_invoice' => "'" . $orderCode . "'"]);
        $dataCourse = (new Course())->find(['id' => $dataInvoice[0]['id_course']]);
        $dataInvoice[0]['name_course'] = $dataCourse[0]['name'];
        if (empty($dataInvoice)) {
            header('Location: /404');
            exit();
        }
        $this->render('shared.invoice', compact('dataInvoice'));
    }
}
