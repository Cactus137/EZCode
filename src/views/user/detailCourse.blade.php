@extends('layouts.user')
@section('content')
    <style>
        .container-xxl {
            background-color: #f8f8f8a3;
        }

        .background-detail-course {
            background-color: #bfbfbf;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            padding: 100px 0;
        }

        .detail-course>* {
            color: white;
        }

        .container-detail-course {
            height: auto;
            border-bottom: 1px solid #c0c0c0a3;
        }

        .tabs {
            display: flex;
            position: relative;
        }

        .tabs .line {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 1px;
            border-radius: 15px;
            background-color: #0d6efd;
            transition: all 0.2s ease;
        }

        .tab-item {
            min-width: 80px;
            padding: 16px 20px 11px 20px;
            font-size: 20px;
            text-align: center;
            color: black;
            background-color: #fff;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom: 1px solid transparent;
            opacity: 0.6;
            cursor: pointer;
            transition: all 0.5s ease;
        }

        .tab-icon {
            font-size: 24px;
            width: 32px;
            position: relative;
            top: 2px;
        }

        .tab-item:hover {
            opacity: 1;
            border-color: #0d6efd;
            color: #0d6efd;
        }

        .tab-item.active {
            color: #0d6efd;
            opacity: 1;
        }

        .tab-content {
            padding: 28px 0;
        }

        .tab-pane {
            display: none;
            margin-left: 20px;
        }

        .tab-pane.active {
            display: block;
        }

        .bg-content {
            background-color: #efefef;
            border-radius: 10px;
            padding: 10px 15px;
        }
    </style>
    <!-- Courses Start -->
    <div class="container-xxl p-0 mb-5">
        @foreach ($data['courses'] as $course)
            @php
                extract($course);
            @endphp
            <div class="container p-0">
                <div class="background-detail-course"
                    style="  background-image: url('{{ asset('img/courses/bg-course.jpg') }}') !important;">
                    <div class="row">
                        <div class="col-md-8 ms-5">
                            <div class="detail-course">
                                <h1>{{ $name }}</h1>
                                <div class="row row-detail-item">
                                    <div class="col-md-5 detail-course-author">
                                        <p>Author: <span>{{ $author }}</span></p>
                                    </div>
                                    <div class="col detail-course-date">
                                        <p>Update: <span>{{ $created_at }}</span></p>
                                    </div>
                                </div>
                                <div class="row row-detail-item">
                                    <div class="col detail-course-rating">
                                        <div class="rating d-flex">
                                            <p class="percent my-0 me-2 p-0">{{ $rating }}</p>
                                            @for ($j = 0; $j < 5; $j++)
                                                <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" height="16"
                                                    width="18" viewBox="0 0 576 512">
                                                    <path fill="#FFD43B"
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                            @endfor
                                            <p class="number-rating my-0 ms-2 p-0">({{ $number_of_participants }})</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-course">
                                <div class="row">
                                    <div
                                        class="course_price mb-4 d-flex justify-content-center align-items-center text-light fs-3">
                                        Price: <span
                                            class="price_after me-2 text-success fs-3 ms-3">${{ $price }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <a href="/payment/{{ $id }}"
                                        class="btn btn-primary m-0 py-2 btn-lg rounded-pill">Join
                                        now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-detail-course">
                    <div class="row mx-5 my-4">
                        <div class="col-md-8 title-course">
                            <p class="text-align-justify">"{{ $title }}"</p>
                        </div>
                    </div>
                </div>
                <div class="container-detail-course">
                    <!-- Tabs navs -->
                    <div class="tabs d-flex justify-content-center align-items-center">
                        <div class="tab-item active">
                            Description
                        </div>
                        <div class="tab-item">
                            Review
                        </div>
                        <div class="tab-item">
                            Related courses
                        </div>
                        <div class="line"></div>
                    </div>

                    <!-- Tab content -->
                    <div class="tab-content">
                        <div class="tab-pane active">
                            {{ $description }}
                        </div>
                        <div class="tab-pane ">
                            @foreach ($data['comments'] as $comment)
                                @php
                                    extract($comment);
                                @endphp
                                <div class="row d-flex mb-4">
                                    <div class="col-1 avatar-account">
                                        <img class="rounded-circle" src="{{ asset('img/accounts/' . $account['avatar']) }}"
                                            alt="" width="60px">
                                    </div>
                                    <div class="col-9 bg-content">
                                        <div class="row d-flex">
                                            <p><span class="fw-bold">{{ $account['username'] }}</span><span
                                                    class="m-0 py-0 px-2">|</span><span>{{ $created_at }}</span></p>
                                        </div>
                                        <div class="row">
                                            <p>{{ $comment }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane">
                            @foreach ($data['related_courses'] as $key => $related_course)
                                <div class="row">
                                    <div class="col-2 mx-3 p-0">
                                        <a href="/course/{{ $related_course['id'] }}" class="text-decoration-none">
                                            <img class="border"
                                                src="{{ asset('img/courses/' . $related_course['thumbnail']) }}"
                                                width="100%">
                                        </a>
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="row">
                                                    <h4>{{ $related_course['name'] }}</h4>
                                                </div>
                                                <div class="row">
                                                    <p class="course_author_name m-0 text-secondary fs-6">
                                                        {{ $related_course['author'] }}</p>
                                                </div>
                                                <div class="row">
                                                    <p>{{ $title }}</p>
                                                </div>
                                                <div class="row">
                                                    <div class="rating d-flex">
                                                        <p class="percent my-0 me-2 p-0">{{ $related_course['rating'] }}
                                                        </p>
                                                        @for ($j = 0; $j < 5; $j++)
                                                            <svg class="mt-1" xmlns="http://www.w3.org/2000/svg"
                                                                height="16" width="18" viewBox="0 0 576 512">
                                                                <path fill="#FFD43B"
                                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                            </svg>
                                                        @endfor
                                                        <p class="number-rating my-0 ms-2 p-0">
                                                            ({{ $related_course['number_of_participants'] }})
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 d-flex justify-content-end align-items-center fs-5">
                                                ${{ $related_course['price'] }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row line border-bottom my-4" style="width: 100%;"></div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Tabs navs -->
                </div>
            </div>
        @endforeach
    </div>
    <!-- Courses End -->
    <script>
        const $ = document.querySelector.bind(document);
        const $$ = document.querySelectorAll.bind(document);

        const tabs = $$(".tab-item");
        const panes = $$(".tab-pane");

        const tabActive = $(".tab-item.active");
        const line = $(".tabs .line");

        requestIdleCallback(function() {
            line.style.left = tabActive.offsetLeft + "px";
            line.style.width = tabActive.offsetWidth + "px";
        });

        tabs.forEach((tab, index) => {
            const pane = panes[index];

            tab.onclick = function() {
                $(".tab-item.active").classList.remove("active");
                $(".tab-pane.active").classList.remove("active");

                line.style.left = this.offsetLeft + "px";
                line.style.width = this.offsetWidth + "px";

                this.classList.add("active");
                pane.classList.add("active");
            };
        });
    </script>
@endsection
