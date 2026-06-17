<?php
include('db_connect.php');

$query = "SELECT * FROM Department";
$result = $conn->query($query);

ob_start();
?>
<h1>🏛 Departments</h1>
<?php
if ($result && $result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>Dept ID</th>
            <th>Dept Name</th>
            <th>Building</th>
            <th>Contact No</th>
          </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["Dept_ID"]."</td>
                <td>".$row["Dept_Name"]."</td>
                <td>".$row["Building"]."</td>
                <td>".$row["Contact_No"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p class='empty'>No departments found.</p>";
}

$content = ob_get_clean();
$title = "Departments";
$page = "departments";
include('layout.php');
?>
