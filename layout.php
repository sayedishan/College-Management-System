<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <title><?= $title ?> | SRM University</title>
</head>
<body>
  <div class="dashboard">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h2>SRM University</h2>
      <nav>
        <ul>
          <li class="<?= ($page == 'students') ? 'active' : '' ?>"><a href="students.php">🎓 Students</a></li>
          <li class="<?= ($page == 'departments') ? 'active' : '' ?>"><a href="departments.php">🏛 Departments</a></li>
          <li class="<?= ($page == 'instructors') ? 'active' : '' ?>"><a href="instructors.php">👩‍🏫 Instructors</a></li>
          <li class="<?= ($page == 'courses') ? 'active' : '' ?>"><a href="courses.php">📘 Courses</a></li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="content">
      <?= $content ?>
    </main>
  </div>
</body>
</html>
