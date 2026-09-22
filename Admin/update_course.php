<?php
$id = $_REQUEST['id'];
include "../config.php";
$query1 = "select * from `courses` where id ='$id'";
$result1 = mysqli_query($con, $query1);
$row1 = mysqli_fetch_array($result1);

?>

<?php include "admin_header.php" ?>

<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Update Course</h1>
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
                    $id1 = $_REQUEST['id'];
                    $name = $_REQUEST['name'];
                    $image = $_FILES['image']['name'];
                    $imaget = $_FILES['image']['tmp_name'];
                    $price = $_REQUEST['price'];
                    
                    $description = $_REQUEST['description'];
                    include "../config.php";




                    if (empty($image)) {
                        $query = "update `courses` set `course_name`='$name',`price`='$price',`description` = '$description'  where id='$id1'";
                    } else
                        $query = "update `courses` set `course_name`='$name',`image` = '$image',`price`='$price',`description` = '$description'  where id='$id1'";


                    $result = mysqli_query($con, $query);

                    if ($result > 0) {
                        //echo mysqli_error($con);
                        move_uploaded_file($imaget, "../upload/" . $image);
                        echo "<script>window.location.assign('manage_course.php?msg=Data has been updated')</script>";
                    } else {
                        //echo mysqli_error($con);
                        echo "<script>window.location.assign('update_course.php?msg= TRY AGAIN')</script>";
                    }
                }


                ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="<?php echo $row1['course_name']; ?>" id="name" required name="name" placeholder="Course Name">
                                <label for="name">Course Name</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" value="<?php echo $row1['price']; ?>" class="form-control" required id="email" name="price" placeholder="Price">
                                <label for="email">Price</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <img src="../upload/<?php echo $row1['image'] ?>" style="height:100px;width:200px;" alt="">
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="file" class="form-control" required id="subject" name="image" placeholder="Image">
                                <label for="subject">Image</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" required placeholder="Description" name="description" id="message" style="height: 150px">
                                    <?php echo $row1['description']; ?>
                                </textarea>
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