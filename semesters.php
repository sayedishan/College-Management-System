<?php
include('db_connect.php');

$query = "SELECT * FROM Semester";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Semesters | SRM University</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
body {
  background: linear-gradient(135deg, #e3f2fd, #f8f9fa);
  font-family: 'Inter', sans-serif;
}
.table-container {
  background: white;
  border-radius: 1.5rem;
  padding: 2rem;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}
th {
  background-color: #1d4ed8;
  color: white;
  text-align: left;
}
</style>
</head>
<body class="min-h-screen flex flex-col">

<header class="bg-blue-700 text-white py-5 text-center shadow-md">
  <h1 class="text-3xl font-bold tracking-wide">Semester Details</h1>
</header>

<main class="flex-grow py-10 px-5">
  <div class="max-w-5xl mx-auto table-container overflow-x-auto">
    <?php if ($result && $result->num_rows > 0): ?>
      <table class="w-full border-collapse">
        <thead>
          <tr>
            <th class="p-3">Semester ID</th>
            <th class="p-3">Semester Name</th>
            <th class="p-3">Start Date</th>
            <th class="p-3">End Date</th>
          </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr class="border-b hover:bg-blue-50">
            <td class="p-3"><?= htmlspecialchars($row['Semester_ID']) ?></td>
            <td class="p-3"><?= htmlspecialchars($row['Semester_Name']) ?></td>
            <td class="p-3"><?= htmlspecialchars($row['Start_Date']) ?></td>
            <td class="p-3"><?= htmlspecialchars($row['End_Date']) ?></td>
          </tr>
        <?php endwhile; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p class="text-center text-red-600 font-medium">No semester data found.</p>
    <?php endif; ?>
  </div>

  <div class="text-center mt-10">
    <a href="index.php" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full transition">⬅ Back to Dashboard</a>
  </div>
</main>

<footer class="bg-blue-700 text-white text-center py-4 mt-10">
  <p>© 2025 SRM University Database Project | Designed by Ananya Mahajan & Sayed Ishan </p>
</footer>

</body>
</html>
