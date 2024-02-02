<?php

namespace App\Controllers;

use eftec\bladeone\BladeOne;

class BaseController
{

    protected function render($viewFile, $data = [])
    {
        $viewDir = "./src/views";
        $storageDir = "./storage";
        $blade = new BladeOne($viewDir, $storageDir, BladeOne::MODE_DEBUG);
        echo $blade->run($viewFile, $data);
    }

    protected function json(array $data, int $code = 200)
    {
        header('Content-Type: application/json');

        http_response_code($code);

        return json_encode($data);
    }
}
