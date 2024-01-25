<?php

namespace App\Models;

use App\Models\Model;

class Category extends Model
{
    public string $table = 'categories';

    public array $fields = [ 
        'id',
        'thumbnail',
        'name',
        'created_at',
        'status',
    ];

    public function __construct()
    {
        parent::__construct();
    }
}
