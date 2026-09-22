<?php include "admin_header.php" ?>

<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Manage Queries</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Queries</li>
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
                            <th scope="col">Email</th>
                           
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../config.php";


                        $query = "SELECT * FROM `query`";

                        $result = mysqli_query($con, $query);


                        $s = 1;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>






                            <tr>
                                <th scope="row"><?php echo $s; ?></th>
                                <td><?php echo $row['name']; ?></td>
                                
                                
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['subject']; ?></td>
                               <td><?php echo $row['message']; ?></td>
                                <td><a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo urlencode($row['email']); ?>&su=<?php echo urlencode($row['subject']); ?>&body=<?php echo urlencode($row['message']); ?>" target="_blank">
                          <button class="btn btn-primary w-100">Reply</button>
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