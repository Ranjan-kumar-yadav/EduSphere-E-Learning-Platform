<?php include "admin_header.php" ?>

    <?php
	
        include "../config.php";
        $query = "SELECT * FROM `user`";
        $query1=  "SELECT * FROM `courses`";
        $query2=  "SELECT * FROM `booking`";
        $query3=  "SELECT * FROM `query`";
        $result = mysqli_query($con, $query);
        $result1 = mysqli_query($con, $query1);
        $result2 = mysqli_query($con, $query2);
        $result3 = mysqli_query($con, $query3);
        $total_users = mysqli_num_rows($result); // Counting total categories
        $total_courses = mysqli_num_rows($result1);
        $total_bookings = mysqli_num_rows($result2);
        $total_queries = mysqli_num_rows($result3);

        ?>


    <style>
    .dashboard{
        height:100px;

    }
    .dashboard:hover{
        background-color:#0d6efd;
        color:white;
    }
    .icon{
        position: relative;
        top:4%
    }
    .head1{
        display:inline-block;
    }
    .head1:hover{
        color:white;
    }
   </style>      
 <div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Dashboard</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Dasboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
 <div class="container mt-5 mb-5" >
        <div class="row">
            <div class="col-lg-5 col-md-5  rounded-3 border border-4 dashboard" >
                <i class="bi bi-book fs-1 fw-bold icon"></i>
                <h3 class="head1">Total Courses: <?php echo $total_courses; ?> </h3>
            </div>
             <div class="col-lg-5 col-md-5 offset-lg-2 offset-md-2 rounded-3 border border-4 dashboard" >
                <i class="bi bi-card-checklist fs-1 fw-bold icon"></i>
                <h3 class="head1">Total Bookings: <?php echo $total_bookings; ?> </h3>
            </div>
        </div>
         <div class="row">
            <div class="col-lg-5 col-md-5 mt-4  rounded-3 border border-4 dashboard" >
                <i class="bi bi-people-fill fs-1 fw-bold icon"></i>
                <h3 class="head1">Total Users <?php echo $total_users; ?></h3>
            </div>
             <div class="col-lg-5 col-md-5 mt-4 offset-lg-2 offset-md-2 rounded-3 border border-4 dashboard" >
            <i class="bi bi-question-circle fs-1 fw-bold icon"></i>


                <h3 class="head1">Total Queries:  <?php echo $total_queries; ?></h3>
            </div>
        </div>
      </div>

   
<?php include "admin_footer.php" ?>