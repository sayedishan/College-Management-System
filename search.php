<?php
include('db_connect.php');
if (!$conn) {
  die(json_encode(["error" => "Database connection failed"]));
}

header('Content-Type: application/json');

$query = $_GET['q'] ?? '';

if (empty($query)) {
    echo json_encode([]);
    exit;
}

$search = "%" . $conn->real_escape_string($query) . "%";

$results = [];

// Search in Student table
$studentSql = "SELECT Student_ID AS id, Name AS name, Email AS info, 'Student' AS type FROM Student WHERE Name LIKE ?";
$stmt = $conn->prepare($studentSql);
$stmt->bind_param("s", $search);
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc()) $results[] = $row;

// Search in Instructor table
$instructorSql = "SELECT Instructor_ID AS id, Name AS name, Email AS info, 'Instructor' AS type FROM Instructor WHERE Name LIKE ?";
$stmt = $conn->prepare($instructorSql);
$stmt->bind_param("s", $search);
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc()) $results[] = $row;

// Search in Course table
$courseSql = "SELECT Course_ID AS id, Course_Name AS name, Credits AS info, 'Course' AS type FROM Course WHERE Course_Name LIKE ?";
$stmt = $conn->prepare($courseSql);
$stmt->bind_param("s", $search);
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc()) $results[] = $row;

echo json_encode($results);
$conn->close();
?>
