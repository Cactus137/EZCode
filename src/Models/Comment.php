<?php

namespace App\Models;

use App\Models\Model;

class Comment extends Model
{
    public string $table = 'comments';

    public array $fields = [
        'id', 
        'id_account', 
        'id_course', 
        'rating', 
        'comment', 
        'created_at', 
        'status'
    ];

    public function __construct()
    {
        parent::__construct();
    }
}
