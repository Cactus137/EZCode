<?php 

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Invoice;

class InvoiceController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Invoice',
        ];

        $this->render('admin.invoice', compact('data'));
    } 
}

?>