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
             <?php for ($i = 0; $i < 12; $i++) : ?>
                 <a href="learn.php" class="text-decoration-none">
                     <div class="col mb-5 mx-4   ">
                         <img src="img/course-1.jpg" class="thumbnail card-img-top" alt="..." style="border-radius: 15px;">
                         <div class="card-body p-0">
                             <h5 class="card-title my-0 text-dark pt-2">Online Literature Course</h5>
                         </div>
                     </div>
                 </a>
             <?php endfor; ?>
         </div>
     </div>
 </div>
 <!-- Team End -->