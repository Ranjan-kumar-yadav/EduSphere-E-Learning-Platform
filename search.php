<?php
include 'db_conn.php';

if (isset($_GET['query'])) {
    $search = $conn->real_escape_string($_GET['query']);
    $sql = "SELECT * FROM courses WHERE course_name LIKE '%$search%' OR description LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h4>Search Results:</h4>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card mb-2'>
                    <div class='card-body'>
                      <h5 class='card-title'>".$row['course_name']."</h5>
                      <p class='card-text'>".$row['description']."</p>
                    </div>
                  </div>";
        }
    } else {
        echo "<p class='text-danger'>No results found!</p>";
    }
}
$conn->close();
?>