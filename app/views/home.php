<?php
// views/home.php
session_start();

// Example session data for display (you can remove this)
$user = $_SESSION['user'] ?? ['name' => 'Guest User', 'email' => 'guest@example.com'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-indigo-900 to-sky-900 text-gray-100 font-sans">

  <!-- Header -->
  <header class="flex justify-between items-center px-8 py-5 border-b border-white/10 bg-white/5 backdrop-blur">
    <h1 class="text-2xl font-bold text-white">MyApp Dashboard</h1>
    <nav class="flex items-center gap-4">
      <a href="/home.php" class="hover:text-indigo-400">Home</a>
      <a href="/auth/dashboard.php" class="hover:text-indigo-400">Dashboard</a>
      <a href="/auth/logout.php" class="bg-rose-600 hover:bg-rose-700 text-white px-4 py-2 rounded-lg">Logout</a>
    </nav>
  </header>

  <!-- Main Section -->
  <main class="max-w-6xl mx-auto mt-10 px-6">
    <section class="mb-10">
      <h2 class="text-3xl font-semibold mb-3">Welcome, <?php echo htmlspecialchars($user['name']); ?> 👋</h2>
      <p class="text-slate-300">You are logged in as <span class="text-indigo-400"><?php echo htmlspecialchars($user['email']); ?></span>.</p>
    </section>

    <!-- Stats Section -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
      <div class="bg-white/5 border border-white/10 rounded-xl p-6 hover:bg-white/10 transition">
        <h3 class="text-lg font-semibold mb-2 text-indigo-400">Total Users</h3>
        <p class="text-3xl font-bold">245</p>
      </div>
      <div class="bg-white/5 border border-white/10 rounded-xl p-6 hover:bg-white/10 transition">
        <h3 class="text-lg font-semibold mb-2 text-indigo-400">Active Projects</h3>
        <p class="text-3xl font-bold">18</p>
      </div>
      <div class="bg-white/5 border border-white/10 rounded-xl p-6 hover:bg-white/10 transition">
        <h3 class="text-lg font-semibold mb-2 text-indigo-400">Notifications</h3>
        <p class="text-3xl font-bold">3</p>
      </div>
    </section>

    <!-- Quick Actions -->
    <section>
      <h3 class="text-xl font-semibold mb-4">Quick Actions</h3>
      <div class="flex flex-wrap gap-4">
        <a href="/create.php" class="px-5 py-3 bg-indigo-500 hover:bg-indigo-600 rounded-lg text-white font-medium shadow">➕ Create Record</a>
        <a href="/students/show.php" class="px-5 py-3 bg-sky-600 hover:bg-sky-700 rounded-lg text-white font-medium shadow">👨‍🎓 View Students</a>
        <a href="/auth/dashboard.php" class="px-5 py-3 bg-emerald-600 hover:bg-emerald-700 rounded-lg text-white font-medium shadow">📊 Go to Dashboard</a>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="mt-16 text-center text-slate-400 text-sm border-t border-white/10 py-4">
    &copy; <?php echo date('Y'); ?> MyCrud. All rights reserved.
  </footer>
</body>
</html>
    