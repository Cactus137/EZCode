<?php

namespace App\Models;

use App\Models\Model;

class Account extends Model
{
    public string $table = 'accounts';

    public array $fields = [ 
        'id',
        'username',
        'email',
        'password',
        'fullname',
        'avatar',
        'role',
        'status',
    ];

    public function __construct()
    {
        parent::__construct();
    }
}
