<?php include "admin_header.php" ?>

<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Completed Bookings</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Bookings</li>
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
            <div class="col-lg-12 mx-auto col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Course Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">User Name</th>
                            <th scope="col">User Email</th>
                            <th scope="col">Status</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include "../config.php";

                        // Updated query to join users table
                        // Filtered for pending bookings
                        $query = "
    SELECT 
        booking.id AS booking_id,
        courses.course_name,
        courses.image,
        courses.price,
        courses.description,
        booking.status,
        user.name AS user_name,
        user.email AS user_email  
    FROM 
        booking
    JOIN 
        courses ON booking.course_id = courses.id
    JOIN 
        user ON booking.user_id = user.id 
    WHERE 
        booking.status = 'Completed'
";


                        $result = mysqli_query($con, $query);
                        $s = 1;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $s; ?></th>
                                <td><?php echo $row['course_name']; ?></td>
                                <td><img src="../upload/<?php echo $row['image'] ?>" style="height:100px;width:100px;" alt=""></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['user_name']; ?></td> <!-- Display user name -->
                                <td><?php echo $row['user_email']; ?></td> <!-- Display user email -->
                                <td><?php echo $row['status']; ?></td> <!-- Display status here -->
                               
                            </tr>
                        <?php $s++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<?php include "admin_footer.php" ?>