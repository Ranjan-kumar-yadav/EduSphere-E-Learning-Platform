<?php include "header.php" ?>

<?php


if (isset($_POST['submit'])) {
    $email = $_REQUEST['email']; 
    $password = $_REQUEST['password']; 

    
   include "./config.php";

  

   
    $q = "SELECT * FROM `admin` WHERE `email` = '$email' AND `password` = '$password'";
    $r = mysqli_query($con, $q);

    // Check if a matching row was found
    if ($row = mysqli_fetch_array($r)) {
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['msg'] = "Login successful";
        echo "<script>window.location.assign('./Admin/dashboard.php');</script>";
    } else {
        echo "<script>window.location.assign('admin_login.php?msg=Please check your credentials again');</script>";
    }

    // Close the database connection
    mysqli_close($con);
}
?>

<!-- Header Start -->
<div class="container-fluid bg-secondary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Admin Login</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="./dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Login</li>
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
                

                <form method="post">
                    <div class="row g-3">
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
                            <button class="btn btn-primary w-100 py-3" name="submit" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<?php include "footer.php" ?>