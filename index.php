<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SRM University Portal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: linear-gradient(135deg, #e3f2fd, #f8f9fa);
      font-family: 'Inter', sans-serif;
    }
    .card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(12px);
      border-radius: 1.5rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    a:hover {
      transform: scale(1.03);
      transition: all 0.2s ease-in-out;
    }
  </style>
</head>

<body class="min-h-screen flex flex-col">
  <!-- Header -->
  <header class="bg-blue-700 text-white py-5 shadow-md">
    <div class="max-w-7xl mx-auto px-5 flex justify-between items-center">
      <h1 class="text-3xl font-bold tracking-wide">SRM University Dashboard</h1>
      <nav class="space-x-6 text-lg">
        <a href="#students" class="hover:text-blue-200">Students</a>
        <a href="#courses" class="hover:text-blue-200">Courses</a>
        <a href="#instructors" class="hover:text-blue-200">Instructors</a>
        <a href="#departments" class="hover:text-blue-200">Departments</a>
      </nav>
    </div>
  </header>

  <!-- Search Section -->
  <section class="bg-white shadow-md py-6 px-5 md:px-10 mt-6 rounded-2xl max-w-4xl mx-auto">
    <h2 class="text-2xl font-semibold text-gray-800 mb-3 text-center">Search Database</h2>
    <div class="flex items-center gap-3">
      <input id="searchInput" type="text" placeholder="Search for a Student, Instructor, or Course..." class="flex-grow border border-gray-300 rounded-full px-5 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
      <button onclick="searchData()" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-full">Search</button>
    </div>
    <div id="searchResults" class="mt-5 text-gray-700"></div>
  </section>

  <!-- Main Content -->
  <main class="flex-grow py-12 px-5 max-w-7xl mx-auto">
    <section id="overview" class="mb-12 text-center">
      <h2 class="text-4xl font-semibold mb-4 text-gray-800">Welcome to SRM University Database Portal</h2>
      <p class="text-gray-600 text-lg max-w-2xl mx-auto">
        Explore data of students, instructors, courses, and departments in a structured and normalized format.
        This dashboard visually represents the organized relational database you built.
      </p>
    </section>

    <!-- Data Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      
      <!-- Students -->
      <div class="card p-6 text-center">
        <h3 class="text-2xl font-bold text-blue-700 mb-2">Students</h3>
        <p class="text-gray-600 mb-4">View all registered students with their personal details, enrolled courses, and performance.</p>
        <a href="students.php" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full inline-block mb-2">View Students</a>
        <a href="add_student.php" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-full inline-block">+ Add Student</a>
      </div>

      <!-- Courses -->
      <div class="card p-6 text-center">
        <h3 class="text-2xl font-bold text-blue-700 mb-2">Courses</h3>
        <p class="text-gray-600 mb-4">Explore courses under each department and check credit details and descriptions.</p>
        <div class="space-x-3">
          <a href="courses.php" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full inline-block">View Courses</a>
          <a href="add_course.php" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-full inline-block">+ Add Course</a>
        </div>
      </div>

      <!-- Instructors -->
      <div class="card p-6 text-center">
        <h3 class="text-2xl font-bold text-blue-700 mb-2">Instructors</h3>
        <p class="text-gray-600 mb-4">Browse instructors by department and view their qualifications and teaching experience.</p>
        <div class="space-x-3">
          <a href="instructors.php" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full inline-block">View Instructors</a>
          <a href="add_instructor.php" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-full inline-block">+ Add Instructor</a>
        </div>
      </div>

      <!-- Departments -->
      <div class="card p-6 text-center">
        <h3 class="text-2xl font-bold text-blue-700 mb-2">Departments</h3>
        <p class="text-gray-600 mb-4">Get details of departments, building locations, and contact numbers.</p>
        <a href="departments.php" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full inline-block">View Departments</a>
      </div>

      <!-- Semesters -->
      <div class="card p-6 text-center">
        <h3 class="text-2xl font-bold text-blue-700 mb-2">Semesters</h3>
        <p class="text-gray-600 mb-4">Check academic timelines, start and end dates for each semester.</p>
        <a href="semesters.php" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full inline-block">View Semesters</a>
      </div>

      <!-- Registrations -->
      <div class="card p-6 text-center">
        <h3 class="text-2xl font-bold text-blue-700 mb-2">Registrations</h3>
        <p class="text-gray-600 mb-4">Analyze which students registered for which courses and track their grades.</p>
        <a href="registrations.php" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-full inline-block">View Registrations</a>
      </div>

      <!-- DCL & TCL Demo -->
      <div class="card p-6 text-center">
        <h3 class="text-2xl font-bold text-blue-700 mb-2">Database Control Demo</h3>
        <p class="text-gray-600 mb-4">
          Understand how DCL & TCL ensure database security and transaction integrity.
        </p>
        <a href="dcl_tcl_demo.php" 
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-full inline-block">
           View Demo
        </a>
      </div>
    </div>
  </main>

  <!-- Delete Data Section -->
  <div class="text-center mt-12">
    <a href="delete_data.php" 
       class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-full text-lg font-semibold shadow-md transition">
       🗑️ Delete Data
    </a>
  </div>
<div class="text-center mt-6">
  <a href="logout.php" class="text-red-600 hover:underline font-semibold">Logout</a>
</div>

  <!-- Footer -->
  <footer class="bg-blue-700 text-white text-center py-4 mt-10">
    <p>© 2025 SRM University Database Project | Designed by Ananya Mahajan & Sayed Ishan</p>
  </footer>

  <script>
    function searchData() {
      const query = document.getElementById('searchInput').value.trim();
      const outputDiv = document.getElementById('searchResults');
      outputDiv.innerHTML = '';

      if (query === '') {
        outputDiv.innerHTML = '<p class="text-center text-gray-500">Please enter a search term.</p>';
        return;
      }

      fetch(`search.php?q=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(results => {
          if (results.length === 0) {
            outputDiv.innerHTML = '<p class="text-center text-red-600">No matching records found.</p>';
            return;
          }

          outputDiv.innerHTML = results.map(r => `
            <div 
              onclick="window.location.href='details.php?type=${encodeURIComponent(r.type)}&id=${encodeURIComponent(r.id)}'"
              class="border rounded-xl p-4 mb-3 shadow-sm bg-gray-50 hover:bg-blue-50 transition cursor-pointer"
            >
              <p><strong>Type:</strong> ${r.type}</p>
              <p><strong>Name:</strong> ${r.name}</p>
              <p><strong>ID:</strong> ${r.id}</p>
              <p><strong>${r.type === 'Course' ? 'Credits' : 'Email'}:</strong> ${r.info}</p>
            </div>
          `).join('');
        })
        .catch(err => {
          outputDiv.innerHTML = '<p class="text-red-600 text-center">Error fetching data.</p>';
        });
    }
  </script>
</body>
</html>
