<?php
include('db_connect.php');

$query = "SELECT * FROM Instructor";
$result = $conn->query($query);

ob_start();
?>
<h1>👩‍🏫 Instructors</h1>
<?php
if ($result && $result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>Instructor ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Hire Date</th>
            <th>Office</th>
            <th>Dept ID</th>
          </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["Instructor_ID"]."</td>
                <td>".$row["Name"]."</td>
                <td>".$row["Email"]."</td>
                <td>".$row["Phone"]."</td>
                <td>".$row["Hire_Date"]."</td>
                <td>".$row["Office"]."</td>
                <td>".$row["Dept_ID"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty'>No instructors found.</p>";
}

$content = ob_get_clean();
$title = "Instructors";
$page = "instructors";
include('layout.php');
?>
