<?php
include('db_connect.php');

// ✅ Function to auto-generate unique Student ID
function generateStudentID($conn) {
    // Get the last student ID numerically sorted
    $result = $conn->query("SELECT Student_ID FROM Student ORDER BY CAST(SUBSTRING(Student_ID, 5) AS UNSIGNED) DESC LIMIT 1");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $last_id = $row['Student_ID'];

        // Extract the numeric part after 'RA' and increment
        $numeric_part = intval(substr($last_id, 4)) + 1;

        // Always use current year prefix, e.g. RA25 for 2025
        $year_prefix = 'RA' . date('y');

        // Pad to maintain consistent ID format (10 digits after prefix)
        return $year_prefix . str_pad($numeric_part, 10, '0', STR_PAD_LEFT);
    } else {
        // If no students exist yet
        return 'RA' . date('y') . '1000100001';
    }
}

// ✅ Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = generateStudentID($conn);
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $dob = $_POST['dob'];
    $address = $conn->real_escape_string($_POST['address']);
    $enrollment_date = $_POST['enrollment_date'];

    // Insert into DB
    $sql = "INSERT INTO Student (Student_ID, Name, Email, Phone, DOB, Address, Enrollment_Date)
            VALUES ('$student_id', '$name', '$email', '$phone', '$dob', '$address', '$enrollment_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('✅ Student added successfully!\\nGenerated ID: $student_id');
                window.location.href='students.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Error adding student: " . addslashes($conn->error) . "');
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
    <title>Add Student | SRM University</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-white flex flex-col items-center justify-center">

    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-lg">
        <h2 class="text-3xl font-bold text-blue-700 mb-6 text-center">Add New Student</h2>

        <form action="add_student.php" method="POST" class="space-y-4">
            <!-- Name -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Full Name</label>
                <input type="text" name="name" placeholder="Enter full name" required class="w-full border rounded-lg px-4 py-2" />
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Email Address</label>
                <input type="email" name="email" placeholder="Enter email address" required class="w-full border rounded-lg px-4 py-2" />
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Phone Number</label>
                <input type="text" name="phone" placeholder="Enter phone number" required class="w-full border rounded-lg px-4 py-2" />
            </div>

            <!-- DOB -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Date of Birth (DOB)</label>
                <input type="date" name="dob" required class="w-full border rounded-lg px-4 py-2" />
            </div>

            <!-- Address -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Address</label>
                <input type="text" name="address" placeholder="Enter residential address" required class="w-full border rounded-lg px-4 py-2" />
            </div>

            <!-- Enrollment Date -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Enrollment Date</label>
                <input type="date" name="enrollment_date" required class="w-full border rounded-lg px-4 py-2" />
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold">
                Add Student
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="index.php" class="text-blue-600 hover:underline">← Back to Home</a>
        </div>
    </div>

</body>
</html>
