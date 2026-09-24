<?php include "admin_header.php" ?>

<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Manage Course</h1>
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


            <div class="col-lg-12 mx-auto col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                           
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../config.php";


                        $query = "SELECT * FROM `courses`";

                        $result = mysqli_query($con, $query);


                        $s = 1;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>






                            <tr>
                                <th scope="row"><?php echo $s; ?></th>
                                <td><?php echo $row['course_name']; ?></td>
                                <td><img src="../upload/<?php echo $row['image'] ?>" style="height=100px;width:100px;" alt=""></td>
                                
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td class="d-flex">
    <a href="delete_course.php?id=<?php echo $row['id']; ?>" class="me-2">
        <button class="btn btn-danger btn-sm">Delete</button>
    </a>
    <a href="update_course.php?id=<?php echo $row['id']; ?>">
        <button class="btn btn-primary btn-sm">Update</button>
    </a>
</td>

                            </tr>
                        <?php $s++;
                        }  ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<?php include "admin_footer.php" ?>