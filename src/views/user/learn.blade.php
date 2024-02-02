@extends('layouts.user')
@section('content')
    <style>
        /* Ẩn Header và Footer */
        header,
        footer {
            display: none;
        }

        /* Style cho div đầu tiên */
        .fixed-top-container {
            position: sticky;
            top: 0;
            background-color: #29303b;
            z-index: 100;
        }

        .fixed-bottom-container {
            position: sticky;
            bottom: 0;
            background-color: #f0f0f0;
            z-index: 100;
        }
    </style>
    @php
        $current_lession = $data['current_lesson'];
    @endphp
    <div class="fixed-top-container shadow py-2">
        <div class="row m-0 p-0">
            <div class="col-1 pe-0">
                <a href="/" class="d-flex align-items-center px-4 py-2 text-decoration-none pe-0">
                    <i class="fa-solid fa-angle-left me-2" style="color: white;"></i>
                    <div class="my-0 me-3 text-light pe-4" style="border-right: 1px solid white;">Home</div>
                </a>
            </div>
            <div class="col-9 text-light d-flex align-items-center ps-0">
                {{ $current_lession[0]['lesson_title'] }}
            </div>
            <div class="col text-light pe-4 text-end align-middle d-flex align-items-center justify-content-end">
                <p class="course-content m-0" style="cursor: pointer; display: none">Menu Course</p>
            </div>
        </div>
    </div>

    <div class="container-fluid p-0 m-0 position-relative">
        <div class="row m-0 p-0 position-relative">
            <div class="content-main col-md-9 p-0 m-0" style="min-height: 100vh;">
                <div class="w-100 " style="height: 1000px;">
                    <iframe style="width: 100%; height: 700px;" src="{{ $current_lession[0]['link_source'] }}"
                        allowfullscreen></iframe>
                    <div class="info-course ms-3">
                        <h5 class="my-4">{{ $current_lession[0]['lesson_title'] }}</h5>
                        <p class="content pe-4">{{ $current_lession[0]['lesson_content'] }}</p>
                    </div>
                </div>
            </div>
            <div class="content-extra col-md-3 p-0 m-0 position-fixed end-0" style="overflow-y: auto; max-height: 100vh;"
                id="contentExtra">
                <div class="top border-bottom d-flex align-items-center justify-content-between fixed-top-container"
                    style="background-color: #e2e2e2">
                    <p class="py-3 m-0 ms-3">Course Content</p>
                    <i id="closeNavMenu" class="fa-solid fa-xmark pe-2" style="cursor: pointer;"></i>
                </div>
                <div class="list-group">
                    @php $i = 1; @endphp
                    @foreach ($data['lessons'] as $lesson)
                        @php
                            extract($lesson);
                        @endphp
                        <a href="/course/{{ $current_lession[0]['id_course'] }}/learn/lesson-{{ $num_lesson }}"
                            class="list-group-item list-group-item-action m-0 border-none py-3">
                            {{ $i . '.&emsp;' . $lesson_title }}
                        </a>
                        @php $i++; @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="fixed-bottom-container shadow py-2">
        <div class="m-0 p-0 d-flex justify-content-center">
            <div class="button">
                <i class="fa-solid fa-chevron-left text-secondary"></i>
                <a href="/course/{{ $current_lession[0]['id_course'] }}/learn/lesson-{{ $current_lession[0]['num_lesson'] - 1 }}"
                    class="btn mx-3 btn-outline-secondary {{ $current_lession[0]['num_lesson'] <= 1 ? 'disabled' : '' }}"
                    style="width: 100px;">Previous</a>
            </div>

            <div class="button">
                <a href="/course/{{ $current_lession[0]['id_course'] }}/learn/lesson-{{ $current_lession[0]['num_lesson'] + 1 }}"
                    class="btn mx-3 btn-outline-primary {{ $current_lession[0]['num_lesson'] >= count($data['lessons']) ? 'disabled' : '' }}"
                    style="width: 100px;">Next</a>
                <i class="fa-solid fa-chevron-right"></i>
            </div>
        </div>
    </div>
    <!-- Container End -->
    <script>
        var closeNavMenu = document.getElementById('closeNavMenu');
        var contentExtra = document.querySelector('.content-extra');
        var contentMain = document.querySelector('.content-main');
        var courseContent = document.querySelector('.course-content');

        closeNavMenu.addEventListener('click', function() {
            contentExtra.style.display = 'none';
            contentMain.classList.remove('col-md-9');
            contentMain.classList.add('col-md-12');
            courseContent.style.display = 'block';
        })

        courseContent.addEventListener('click', function() {
            contentExtra.style.display = 'block';
            contentMain.classList.remove('col-md-12');
            contentMain.classList.add('col-md-9');
            courseContent.style.display = 'none';
        })
    </script>
@endsection
