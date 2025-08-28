<?php
session_start();
$error = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : "";
unset($_SESSION['login_error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

  <div class="bg-white shadow-lg rounded-lg p-8 w-96">
    <h2 class="text-2xl font-bold mb-6 text-center">Login Admin</h2>

    <?php if ($error): ?>
      <p class="mb-4 text-red-500 text-center"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="login.php" method="POST" class="space-y-4">
      <div>
        <label class="block text-gray-700">Username</label>
        <input type="text" name="username" required 
          class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
      </div>
      <div>
        <label class="block text-gray-700">Password</label>
        <input type="password" name="password" required 
          class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
      </div>
      <button type="submit" 
        class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Login</button>
    </form>
  </div>

</body>
</html>
