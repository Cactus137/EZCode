 <style>
     .thumbnail:hover {
         background-color: black;
         opacity: 0.5;
     }
 </style>
 <!-- Team Start -->
 <div class="container-xxl py-5">
     <div class="container">
         <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
             <h6 class="section-title bg-white text-center text-primary px-3">My Course</h6>
             <h1 class="mb-5">My course</h1>
         </div>
         <div class="row row-cols-1 row-cols-md-3 g-4 mb-4 wow fadeInUp" data-wow-delay="0.1s">
             <?php
                foreach ($data['courses'] as $course) :
                    extract($course);
                ?>
                 <a href="/course/<?= $id?>/learn/lesson-1" class="text-decoration-none">
                     <div class="col mb-5 mx-4">
                         <img src="<?= asset('img/courses/' . $thumbnail) ?>" class="thumbnail card-img-top" alt="..." style="border-radius: 15px;">
                         <div class="card-body p-0">
                             <h5 class="card-title my-0 text-dark pt-2"><?= $name ?></h5>
                         </div>
                     </div>
                 </a>
             <?php endforeach; ?>
         </div>
     </div>
 </div>
 <!-- Team End -->