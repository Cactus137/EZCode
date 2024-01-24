<?php

namespace App\Models;

use App\Models\Model;

class Lesson extends Model
{
    public string $table = 'lessons';

    public array $fields = [
        'id',
        'id_course',
        'num_lesson',
        'lesson_title',
        'link_source',
        'lesson_content',
    ];

    public function __construct()
    {
        parent::__construct();
    }
}
