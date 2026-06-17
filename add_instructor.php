<?php
include('db_connect.php');

// ✅ Auto-generate Instructor ID
function generateInstructorID($conn) {
    $result = $conn->query("SELECT Instructor_ID FROM Instructor ORDER BY Instructor_ID DESC LIMIT 1");
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $last_id = intval($row['Instructor_ID']);
        return $last_id + 1;
    } else {
        return 101; // first ID if table empty
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $instructor_id = generateInstructorID($conn);
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $hire_date = $_POST['hire_date'];
    $office = $conn->real_escape_string($_POST['office']);
    $dept_id = intval($_POST['dept_id']);

    $sql = "INSERT INTO Instructor (Instructor_ID, Name, Email, Phone, Hire_Date, Office, Dept_ID)
            VALUES ('$instructor_id', '$name', '$email', '$phone', '$hire_date', '$office', '$dept_id')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('✅ Instructor added successfully!\\nGenerated ID: $instructor_id');
                window.location.href='instructors.php';
              </script>";
    } else {
        echo "<script>
                alert('❌ Error: " . addslashes($conn->error) . "');
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
    <title>Add Instructor | SRM University</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-white flex flex-col items-center justify-center">

    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-lg">
        <h2 class="text-3xl font-bold text-blue-700 mb-6 text-center">Add New Instructor</h2>

        <form action="add_instructor.php" method="POST" class="space-y-4">
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

            <!-- Hire Date -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Hire Date</label>
                <input type="date" name="hire_date" required class="w-full border rounded-lg px-4 py-2" />
            </div>

            <!-- Office -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Office Location</label>
                <input type="text" name="office" placeholder="e.g. CSE-101" required class="w-full border rounded-lg px-4 py-2" />
            </div>

            <!-- Department Dropdown -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Department</label>
                <select name="dept_id" required class="w-full border rounded-lg px-4 py-2">
                    <option value="" disabled selected>Select Department</option>
                    <?php
                        include('db_connect.php');
                        $deptResult = $conn->query("SELECT Dept_ID, Dept_Name FROM Department");
                        while ($dept = $deptResult->fetch_assoc()) {
                            echo "<option value='{$dept['Dept_ID']}'>{$dept['Dept_Name']} (ID: {$dept['Dept_ID']})</option>";
                        }
                        $conn->close();
                    ?>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold">
                Add Instructor
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="index.php" class="text-blue-600 hover:underline">← Back to Home</a>
        </div>
    </div>

</body>
</html>
