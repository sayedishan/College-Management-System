<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];
    $input = trim($_POST['input']);
    $query = "";

    if ($type === "Student") {
        // Try to match either Student_ID or Name
        $query = "DELETE FROM Student WHERE Student_ID = '$input' OR Name = '$input'";
    } elseif ($type === "Course") {
        $query = "DELETE FROM Course WHERE Course_ID = '$input' OR Course_Name = '$input'";
    } elseif ($type === "Instructor") {
        $query = "DELETE FROM Instructor WHERE Instructor_ID = '$input' OR Name = '$input'";
    }

    if ($query) {
        if ($conn->query($query) === TRUE && $conn->affected_rows > 0) {
            echo "<script>alert('✅ $type with ID/Name \"$input\" deleted successfully!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('❌ No matching $type found for \"$input\".');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Data | SRM University</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-white flex flex-col items-center justify-center">

  <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-lg">
    <h2 class="text-3xl font-bold text-red-600 mb-6 text-center">⚠️ Delete Data</h2>

    <form action="delete_data.php" method="POST" class="space-y-5">
      <!-- Select Type -->
      <div>
        <label class="block text-gray-700 font-medium mb-1">Select Data Type</label>
        <select name="type" required class="w-full border rounded-lg px-4 py-2">
          <option value="" disabled selected>Select Type</option>
          <option value="Student">Student</option>
          <option value="Course">Course</option>
          <option value="Instructor">Instructor</option>
        </select>
      </div>

      <!-- Enter ID or Name -->
      <div>
        <label class="block text-gray-700 font-medium mb-1">Enter ID or Name to Delete</label>
        <input type="text" name="input" placeholder="e.g. RA221000100001 or Amit Patel" required 
               class="w-full border rounded-lg px-4 py-2" />
      </div>

      <!-- Delete Button -->
      <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-lg font-semibold">
        Delete Record
      </button>
    </form>

    <div class="text-center mt-4">
      <a href="index.php" class="text-blue-600 hover:underline">← Back to Home</a>
    </div>
  </div>

</body>
</html>
