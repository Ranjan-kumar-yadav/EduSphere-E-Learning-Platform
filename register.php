<?php include "header.php" ?>

<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Register</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Register</li>
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
                    include "./config.php";

                    // Collect form data (using $_POST instead of $_REQUEST)
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];  // plain-text (not recommended for production)
                    $contact = $_POST['contact'];
                    $address = $_POST['address'];

                    // Check if email already exists
                    $check_query = "SELECT * FROM `user` WHERE `email` = '$email'";
                    $check_result = mysqli_query($con, $check_query);

                    if (mysqli_num_rows($check_result) > 0) {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
               <strong>User!</strong> already exists.
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>';
                    } else {
                        //  Corrected query with closing quote and parenthesis
                        $query = "INSERT INTO `user` (`name`, `email`, `password`, `contact`, `address`) 
                  VALUES ('$name', '$email', '$password', '$contact', '$address')";

                        $result = mysqli_query($con, $query);

                        if ($result) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    User added <strong>successfully</strong>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
                        } else {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> ' . mysqli_error($con) . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
                        }
                    }
                }
                ?>

                <form method="post">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" required name="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" required id="email" name="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" required id="subject" name="password" placeholder="Password">
                                <label for="subject">Password</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" required id="subject" name="contact" placeholder="Contact">
                                <label for="subject">Contact</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" required placeholder="Leave a message here" name="address" id="message" style="height: 150px"></textarea>
                                <label for="message">Address</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" name="save" type="submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<?php include "footer.php" ?>