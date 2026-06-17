<?php
include('db_connect.php');

$query = "SELECT * FROM Student";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard | SRM University</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="dashboard">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h2><a href="index.php" style="all: unset; cursor: pointer;">SRM University</a></h2>
      <nav>
        <ul>
          <li class="active"><a href="students.php">🎓 Students</a></li>
          <li><a href="departments.php">🏛 Departments</a></li>
          <li><a href="instructors.php">👩‍🏫 Instructors</a></li>
          <li><a href="#">📘 Courses</a></li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="content">
      <h1>🎓 Student Records</h1>

      <?php
      if ($result && $result->num_rows > 0) {
          echo "<table>";
          echo "<tr>
                  <th>Student ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>DOB</th>
                  <th>Address</th>
                  <th>Enrollment Date</th>
                </tr>";
          while ($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>".$row["Student_ID"]."</td>
                      <td>".$row["Name"]."</td>
                      <td>".$row["Email"]."</td>
                      <td>".$row["Phone"]."</td>
                      <td>".$row["DOB"]."</td>
                      <td>".$row["Address"]."</td>
                      <td>".$row["Enrollment_Date"]."</td>
                    </tr>";
          }
          echo "</table>";
      } else {
          echo "<p class='empty'>No student records found.</p>";
      }
      $conn->close();
      ?>
    </main>
  </div>
</body>
</html>
