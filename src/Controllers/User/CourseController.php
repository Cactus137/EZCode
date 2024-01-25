<?php

namespace App\Controllers\User;

use App\Controllers\Controller;
use App\Models\Course;
use App\Models\Comment;
use App\Models\Account;
use App\Models\Invoice;
use App\Models\Lesson;
use App\Models\Category;
use App\Models\PageLayout;

class CourseController extends Controller
{
    public function index()
    {
        $course = new Course();
        $rating = new Comment();
        $courses = $course->find([
            'status' => 1
        ]);
        $categories = [];
        foreach ($courses as $key => $value) {
            $number_of_participants = $rating->find(['id_course' => $value['id'], 'status' => 1]);
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

        view('user', [
            'content' => PageLayout::user('course'),
            'data' => $data
        ]);
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
            'status' => 1,
            'id !' => $id,
        ]);
        
        // Add number of participants to course
        $comments = $comment->find(['id_course' => $id, 'status' => 1]);
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

        view('user', [
            'content' => PageLayout::user('detailCourse'),
            'data' => $data
        ]);
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

        view('user', [
            'content' => PageLayout::user('learn'),
            'data' => $data
        ]);
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

        view('user', [
            'content' => PageLayout::user('myCourses'),
            'data' => $data
        ]);
    }

    public function category($id) {
        $course = new Course();
        $courses = $course->find([
            'id_category' => $id,
            'status' => 1
        ]);

        $data = [
            'title' => 'Category',
            'courses' => $courses
        ];

        view('user', [
            'content' => PageLayout::user('course'),
            'data' => $data
        ]);
    }
}
