<div class="d-flex justify-content-center flex-wrap">
<?php
include "./config.php";

if (isset($_GET['query'])) {
    $search = $_GET['query'];
    $query = "SELECT * FROM `courses` WHERE `course_name` LIKE '%$search%'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="upload/<?php echo $row['image']; ?>" 
                             style="height:200px; width:100%; object-fit:cover;" alt="">
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h5><?php echo $row['course_name']; ?></h5>
                        <p style="text-align: justify;"><?php echo $row['description']; ?></p>
                    </div>
                    <form method="post">
                        <input type="hidden" name="course_id" value="<?php echo $row['id']; ?>">
                        <button class="btn btn-outline-dark rounded-3 offset-lg-4 mb-3" name="book">Book Now</button>
                    </form>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p class='text-center'>No course found.</p>";
    }
}
?>
</div>
