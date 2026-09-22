<?php include "header.php" ?>


<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Courses</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Courses</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- search start -->
  <div class="container mt-5">
          <h2 class="text-center">Mini Search Engine</h2>
        <form method="GET" action="courses.php" class="d-flex mt-3">
            <input type="text" name="query" class="form-control me-2" placeholder="Search here..." required>
            <button class="btn btn-primary">Search</button>
        </form>
        <hr>
        <div>
          <?php include 'search.php'; ?>
        </div>
      </div>
<!-- search end -->

<!-- Categories Start -->

<!-- Categories Start -->

<!-- Courses Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
            <h1 class="mb-5">Popular Courses</h1>
        </div>
        <div class="row g-4 justify-content-center">

            <?php
            if (isset($_POST['book'])) {
                $course_id = $_POST['course_id'];

                // Check if user is logged in
                if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        You must <strong>log in</strong> to book a course.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
                } else {
                    $user_id = $_SESSION['id'];

                    include "./config.php";

                    $check_query = "SELECT * FROM `booking` WHERE `user_id` = '$user_id' AND `course_id` = '$course_id'";
                    $check_result = mysqli_query($con, $check_query);

                    if (mysqli_num_rows($check_result) > 0) {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning:</strong> You have already booked this course.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                    } else {
                        $query = "INSERT INTO `booking`(`course_id`, `user_id`) VALUES ('$course_id','$user_id')";
                        $result = mysqli_query($con, $query);

                        if ($result) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Course booked <strong>successfully</strong>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                        } else {
                            echo "Database error: " . mysqli_error($con);
                        }
                    }
                }
            }
            ?>




            <?php
            include "./config.php";


            $query = "SELECT * FROM `courses`";

            $result = mysqli_query($con, $query);


            $s = 1;
            while ($row = mysqli_fetch_array($result)) {
            ?>






                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="upload/<?php echo $row['image']; ?>" style="height:200px" alt="">

                        </div>
                        <div class="text-center p-4 pb-0">

                            <h5 class=""><?php echo $row['course_name'] ?></h5>
                            <p><?php echo $row['description'] ?> </p>
                        </div>
                       <form method="post">
                        <input type="hidden" name="course_id" value="<?php echo $row['id']; ?>">
                         <button class="btn btn-outline-dark rounded-3 offset-lg-4 mb-3" name="book">Book Now</button>
                       </form>
                    </div>
                </div>
            <?php $s++;
            }  ?>



        </div>
    </div>
</div>
<!-- Courses End -->


<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
            <h1 class="mb-5">Our Students Say!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Name</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Name</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Name</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-4.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">Client Name</h5>
                <p>Profession</p>
                <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<?php include "footer.php" ?>