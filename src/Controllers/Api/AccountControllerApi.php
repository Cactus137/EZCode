<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Account;

class AccountControllerApi extends BaseController
{
    public function show($id)
    {
        $account = (new Account)->find(['id' => $id]);
        echo $this->json($account, 200);
    }
}
