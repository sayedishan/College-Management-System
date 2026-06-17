<?php
include('db_connect.php');

$query = "SELECT * FROM Course";
$result = $conn->query($query);

ob_start();
?>
<h1>📘 Courses</h1>
<?php
if ($result && $result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>Course ID</th>
            <th>Course Name</th>
            <th>Credits</th>
            <th>Dept ID</th>
          </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["Course_ID"]."</td>
                <td>".$row["Course_Name"]."</td>
                <td>".$row["Credits"]."</td>
                <td>".$row["Dept_ID"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty'>No courses found.</p>";
}

$content = ob_get_clean();
$title = "Courses";
$page = "courses";
include('layout.php');
?>
