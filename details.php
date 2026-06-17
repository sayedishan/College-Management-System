<?php
include('db_connect.php');

$type = $_GET['type'] ?? '';
$id = $_GET['id'] ?? '';

if (!$type || !$id) {
    die("<h2 style='text-align:center; color:red;'>Invalid request.</h2>");
}

switch ($type) {
    case 'Student':
        $query = "SELECT * FROM Student WHERE Student_ID = '$id'";
        break;
    case 'Instructor':
        $query = "SELECT * FROM Instructor WHERE Instructor_ID = '$id'";
        break;
    case 'Course':
        $query = "SELECT * FROM Course WHERE Course_ID = '$id'";
        break;
    case 'Department':
        $query = "SELECT * FROM Department WHERE Dept_ID = '$id'";
        break;
    case 'Semester':
        $query = "SELECT * FROM Semester WHERE Semester_ID = '$id'";
        break;
    case 'Registration':
        $query = "SELECT * FROM Registration WHERE Registration_ID = '$id'";
        break;
    default:
        die("<h2 style='text-align:center; color:red;'>Unknown record type.</h2>");
}

$result = $conn->query($query);
if (!$result || $result->num_rows === 0) {
    die("<h2 style='text-align:center; color:red;'>No record found for ID: $id</h2>");
}

$data = $result->fetch_assoc();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($type) ?> Details | SRM University</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
body {
  background: linear-gradient(135deg, #e3f2fd, #f8f9fa);
  font-family: 'Inter', sans-serif;
}
.card {
  background: rgba(255, 255, 255, 0.97);
  backdrop-filter: blur(10px);
  border-radius: 1.5rem;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card:hover {
  transform: translateY(-3px);
  box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}
</style>
</head>

<body class="min-h-screen flex flex-col">

<!-- Header -->
<header class="bg-blue-700 text-white py-5 text-center shadow-md">
  <h1 class="text-3xl font-bold tracking-wide"><?= htmlspecialchars($type) ?> Details</h1>
</header>

<!-- Main Content -->
<main class="flex-grow flex justify-center items-center py-10">
  <div class="card p-8 w-full max-w-3xl">
    <h2 class="text-2xl font-semibold text-blue-700 mb-6 text-center">
      <?= htmlspecialchars($data['Name'] ?? $data['Course_Name'] ?? $data['Dept_Name'] ?? $data['Semester_Name'] ?? 'Details') ?>
    </h2>

    <table class="w-full border-collapse">
      <?php foreach ($data as $key => $value): ?>
      <tr class="border-b">
        <td class="py-3 px-4 font-semibold text-gray-700 capitalize"><?= str_replace("_", " ", htmlspecialchars($key)) ?></td>
        <td class="py-3 px-4 text-gray-600"><?= htmlspecialchars($value) ?></td>
      </tr>
      <?php endforeach; ?>
    </table>

    <div class="mt-8 text-center">
      <a href="index.php" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full transition">
        ⬅ Back to Dashboard
      </a>
    </div>
  </div>
</main>

<!-- Footer -->
<footer class="bg-blue-700 text-white text-center py-4 mt-10">
  <p>© 2025 SRM University Database Project | Designed by Ananya Mahajan & Sayed Ishan </p>
</footer>

</body>
</html>
