<?php
include('db_connect.php');

// ✅ Auto-generate Course ID
function generateCourseID($conn) {
    // Fetch the last course ID numerically
    $result = $conn->query("SELECT Course_ID FROM Course ORDER BY Course_ID DESC LIMIT 1");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $last_id = intval($row['Course_ID']);
        $new_id = $last_id + 1;
        return $new_id;
    } else {
        // If no courses yet, start from 201 (like your dataset)
        return 201;
    }
}

// ✅ Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = generateCourseID($conn);
    $course_name = $conn->real_escape_string($_POST['course_name']);
    $credits = intval($_POST['credits']);
    $dept_id = intval($_POST['dept_id']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "INSERT INTO Course (Course_ID, Course_Name, Credits, Dept_ID, Description)
            VALUES ('$course_id', '$course_name', '$credits', '$dept_id', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('✅ Course added successfully!\\nGenerated ID: $course_id');
                window.location.href='courses.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Error adding course: " . addslashes($conn->error) . "');
                window.history.back();
              </script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course | SRM University</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-white flex flex-col items-center justify-center">

    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-lg">
        <h2 class="text-3xl font-bold text-blue-700 mb-6 text-center">Add New Course</h2>

        <form action="add_course.php" method="POST" class="space-y-4">
            <!-- Course Name -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Course Name</label>
                <input type="text" name="course_name" placeholder="Enter course name" required class="w-full border rounded-lg px-4 py-2" />
            </div>

            <!-- Credits -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Credits</label>
                <input type="number" name="credits" placeholder="Enter number of credits" min="1" max="10" required class="w-full border rounded-lg px-4 py-2" />
            </div>

            <!-- Department ID -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Department ID</label>
                <input type="number" name="dept_id" placeholder="Enter department ID (e.g., 1 for CSE)" required class="w-full border rounded-lg px-4 py-2" />
            </div>

            <!-- Description -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Description</label>
                <textarea name="description" rows="3" placeholder="Enter brief course description" required class="w-full border rounded-lg px-4 py-2"></textarea>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold">
                Add Course
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="index.php" class="text-blue-600 hover:underline">← Back to Home</a>
        </div>
    </div>

</body>
</html>
