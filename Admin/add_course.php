<?php include "admin_header.php" ?>

<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Add Course</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Course</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">

        <div class="row g-4">


            <div class="col-lg-6 mx-auto col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <?php
                if (isset($_POST['save'])) {
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $description = $_POST['description'];

                    $image = $_FILES['image']['name'];
                    $imaget = $_FILES['image']['tmp_name'];

                    include "../config.php";

                    $check_query = "SELECT * FROM `courses` WHERE `course_name` = '$name'";
                    $check_result = mysqli_query($con, $check_query);

                    if (mysqli_num_rows($check_result) > 0) {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>course!</strong> already exists.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
                    } else {
                        $query = "INSERT INTO `courses`(`course_name`, `price`, `image`, `description`) 
                  VALUES ('$name','$price','$image','$description')";
                        $result = mysqli_query($con, $query);

                        if ($result) {
                            if (move_uploaded_file($imaget, "../upload/" . $image)) {
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Course added <strong>successfully</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                            } else {
                                echo "File upload failed.";
                            }
                        } else {
                            echo "Database error: " . mysqli_error($con);
                        }
                    }
                }
                ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" required name="name" placeholder="Course Name">
                                <label for="name">Course Name</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" required id="email" name="price" placeholder="Price">
                                <label for="email">Price</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="file" class="form-control" required id="subject" name="image" placeholder="Image">
                                <label for="subject">Image</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" required placeholder="Description" name="description" id="message" style="height: 150px"></textarea>
                                <label for="message">Description</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" name="save" type="submit">SAVE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<?php include "admin_footer.php" ?>