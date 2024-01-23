<?php

namespace App\Models;

use App\Models\Model;

class Invoice extends Model
{
    public string $table = 'invoices';

    public array $fields = [ 
        'id',
        'code_invoice',
        'id_account',
        'id_course',
        'email',
        'issue_date',
        'total_price',
    ];

    public function __construct()
    {
        parent::__construct();
    }
}
