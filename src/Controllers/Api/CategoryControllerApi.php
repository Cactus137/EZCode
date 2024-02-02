<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Category;

class CategoryControllerApi extends BaseController
{  
    public function show($id)
    {
        $category = (new Category)->find(['id' => $id]);
        echo $this->json($category, 200);
    }
}
