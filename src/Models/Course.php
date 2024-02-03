<?php

namespace App\Models;

use App\Models\Model;

class Course extends Model
{
    public string $table = 'courses';

    public array $fields = [ 
        'id',
        'name',
        'title',
        'thumbnail',
        'price',
        'description',
        'rating',
        'status',
        'author',
        'created_at',
        'id_category', 
    ];

    public function __construct()
    {
        parent::__construct();
    }
    
}
