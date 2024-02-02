<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Course;
use App\Models\Comment;
use App\Models\Account;
use App\Models\Invoice;
use App\Models\Lesson;
use App\Models\Category;

class CourseController extends BaseController
{
    public function index()
    {
        $course = new Course();
        $rating = new Comment();
        $courses = $course->find([
            'status' => 0
        ]);
        $categories = [];
        foreach ($courses as $key => $value) {
            $number_of_participants = $rating->find(['id_course' => $value['id'], 'status' => 0]);
            $courses[$key]['number_of_participants'] = count($number_of_participants);
            $cat = new Category();
            $category = $cat->find(['id' => $value['id_category']]);
            $categories = array_merge($categories, $category);
        }

        $data = [
            'title' => 'Course',
            'courses' => $courses,
            'categories' => $categories,
        ];

        $this->render('user.course', compact('data'));
    }

    public function category($id)
    {
        $course = new Course();
        $courses = $course->find([
            'id_category' => $id,
            'status' => 0
        ]);

        $data = [
            'title' => 'Category',
            'courses' => $courses
        ];

        $this->render('user.category', compact('data'));
    }

    public function show($id)
    {
        $course = new Course();
        $comment = new Comment();
        $account = new Account();

        $courses = $course->find([
            'id' => $id,
        ]);
        // Related courses
        $related_courses = $course->find([
            'id_category' => $courses[0]['id_category'],
            'status' => 0,
            'id !' => $id,
        ]);

        // Add number of participants to course
        $comments = $comment->find(['id_course' => $id, 'status' => 0]);
        $courses[0]['number_of_participants'] = count($comments);
        if (!empty($related_courses)) {
            $related_courses[0]['number_of_participants'] = count($comments);
        }
        // Get account
        foreach ($comments as $key => $value) {
            $account_data = $account->find(['id' => $value['id_account']]);
            $comments[$key]['account'] = $account_data[0];
        }

        $data = [
            'title' => 'detailCourse',
            'courses' => $courses,
            'comments' => $comments,
            'related_courses' => $related_courses,
        ];

        $this->render('user.detailCourse', compact('data'));
    }

    public function myCourse()
    {
        $invoice = new Invoice();
        $invoices = $invoice->all();

        $myCourses = [];
        foreach ($invoices as $key => $value) {
            $course = new Course();
            $courses = $course->find([
                'id' => $value['id_course']
            ]);
            $myCourses = array_merge($myCourses, $courses);
        }

        $data = [
            'title' => 'My Course',
            'courses' => $myCourses
        ];

        $this->render('user.myCourses', compact('data'));
    }

    public function learn($id, $lessonId)
    {
        $course = new Course();
        $lesson = new Lesson();
        $courses = $course->find([
            'id' => $id,
        ]);
        $current_lesson = $lesson->find([
            'id_course' => $id,
            'num_lesson' => $lessonId
        ]);
        $lessons = $lesson->find([
            'id_course' => $id,
        ]);

        $data = [
            'title' =>  'Learn',
            'current_lesson' => $current_lesson,
            'lessons' => $lessons,
        ];

        $this->render('user.learn', compact('data'));
    }
}
