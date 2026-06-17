<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DCL & TCL Demo | SRM University</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: linear-gradient(135deg, #e3f2fd, #f8f9fa);
      font-family: 'Inter', sans-serif;
    }
    a:hover {
      transform: scale(1.03);
      transition: all 0.2s ease-in-out;
    }
  </style>
</head>

<body class="min-h-screen flex flex-col items-center justify-center py-10">
  <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-3xl border border-gray-200">
    
    <!-- Title -->
    <h1 class="text-3xl font-bold text-blue-700 mb-4 text-center">DCL & TCL Demonstration</h1>

    <p class="text-gray-600 text-center mb-6">
      This section visually represents how <strong>Data Control Language (DCL)</strong> and 
      <strong>Transaction Control Language (TCL)</strong> ensure database security and consistency.
    </p>

    <!-- DCL Section -->
    <div class="space-y-6 text-sm font-mono bg-gray-50 p-6 rounded-lg border border-gray-200">
      <div>
        <h2 class="font-bold text-blue-700">🔐 DCL (Data Control Language)</h2>
        <pre class="bg-gray-100 p-3 rounded-md mt-2 overflow-auto">
CREATE USER 'readonly_user'@'localhost' IDENTIFIED BY 'password123';
GRANT SELECT ON SRM_University.* TO 'readonly_user'@'localhost';
REVOKE SELECT ON SRM_University.* FROM 'readonly_user'@'localhost';
        </pre>
        <p class="mt-2 text-gray-700">
          ➤ These commands manage user access, permissions, and database privileges.
        </p>
      </div>

      <!-- TCL Section -->
      <div>
        <h2 class="font-bold text-blue-700">💾 TCL (Transaction Control Language)</h2>
        <pre class="bg-gray-100 p-3 rounded-md mt-2 overflow-auto">
START TRANSACTION;
UPDATE Student SET Address = 'Test City' WHERE Student_ID = 'RA221000100001';
ROLLBACK;   -- Undo the change
UPDATE Student SET Address = 'Chennai' WHERE Student_ID = 'RA221000100001';
COMMIT;     -- Save the change
        </pre>
        <p class="mt-2 text-gray-700">
          ➤ TCL commands like <strong>COMMIT</strong> and <strong>ROLLBACK</strong> ensure safe and consistent updates.
        </p>
      </div>
    </div>

    <!-- Buttons -->
    <div class="text-center mt-8 space-x-4">
      <a href="dcl_tcl_demo.sql" download 
         class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-full shadow-md">
         ⬇️ Download SQL File
      </a>
      <a href="index.php" 
         class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2 rounded-full shadow-md">
         ← Back to Home
      </a>
    </div>

    <!-- Footer -->
    <p class="text-center text-gray-500 text-sm mt-6">
      © 2025 SRM University | Designed by Ananya Mahajan & Sayed Ishan
    </p>
  </div>
</body>
</html>
