<?php

namespace App\Controllers;


class Controller
{
    protected function json(array $data, int $code = 200)
    {
        header('Content-Type: application/json');

        http_response_code($code);

        return json_encode($data);
    } 
 
}
