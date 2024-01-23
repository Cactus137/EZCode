<?php

namespace App\Models;

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
