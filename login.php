<?php
session_start();

// Define the correct password (you can change this)
$correct_password = "admin123";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $entered_password = $_POST['password'];

    if ($entered_password === $correct_password) {
        $_SESSION['logged_in'] = true;
        header("Location: index.php");
        exit();
    } else {
        $error = "Incorrect password. Try again!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | SRM University</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-white">

  <div class="bg-white shadow-2xl rounded-2xl p-10 w-full max-w-md text-center">
    <h1 class="text-3xl font-bold text-blue-700 mb-6">Admin Login</h1>
    
    <?php if (isset($error)) : ?>
      <p class="text-red-600 mb-4 font-medium"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST">
      <input 
        type="password" 
        name="password" 
        placeholder="Enter Admin Password" 
        class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-5 focus:outline-none focus:ring-2 focus:ring-blue-400"
        required
      />
      <button 
        type="submit" 
        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold transition">
        Login
      </button>
    </form>
  </div>

</body>
</html>
