<?php

namespace App\Controllers\Api;

use App\Controllers\Controller;
use App\Models\Category;

class CategoryControllerApi extends Controller
{
    // public function index()
    // {
    //     $categories = (new Category)->all();
    //     return $this->json($categories, 200);
    // }

    public function show($id)
    {
        $category = (new Category)->find(['id' => $id]);
        echo $this->json($category, 200);
    }
}
