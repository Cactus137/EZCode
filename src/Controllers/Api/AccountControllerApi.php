<?php

namespace App\Controllers\Api;

use App\Controllers\Controller;
use App\Models\Account;

class AccountControllerApi extends Controller
{
    public function show($id)
    {
        $account = (new Account)->find(['id' => $id]);
        echo $this->json($account, 200);
    }
}
