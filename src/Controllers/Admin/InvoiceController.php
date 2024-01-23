<?php 

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Models\Invoice;
use App\Models\PageLayout;

class InvoiceController extends Controller
{
    public function index()
    {
        view('admin', [
            'content' => PageLayout::admin('invoice')
        ]);
    } 
}

?>