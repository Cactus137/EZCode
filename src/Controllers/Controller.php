<?php

namespace App\Controllers;


class Controller
{
    protected function json(array $data, int $code = 200)
    {
        header('Content-Type: application/json');

        http_response_code($code);

        echo json_encode($data);
    }

    public function vd($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }
 
}
