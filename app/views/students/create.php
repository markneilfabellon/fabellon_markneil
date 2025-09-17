<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Student</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: linear-gradient(135deg, #0f172a, #1e293b);
      color: #e2e8f0;
      font-family: 'Inter', sans-serif;
    }
    .glass {
      background: rgba(30,41,59,0.7);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(148,163,184,0.2);
    }
    input {
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(148,163,184,0.2);
      color: #e2e8f0;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center">
  <div class="glass p-8 rounded-2xl shadow-2xl w-full max-w-md">
    <h1 class="text-3xl font-extrabold mb-6 text-center text-cyan-400">+ Add Student</h1>
    <form action="/students/create" method="POST" class="space-y-4">
      <div>
        <label class="block mb-1 text-sm text-gray-300">Last Name</label>
        <input type="text" name="last_name" class="w-full rounded-md px-3 py-2 focus:ring-2 focus:ring-cyan-500 outline-none" required>
      </div>
      <div>
        <label class="block mb-1 text-sm text-gray-300">First Name</label>
        <input type="text" name="first_name" class="w-full rounded-md px-3 py-2 focus:ring-2 focus:ring-cyan-500 outline-none" required>
      </div>
      <div>
        <label class="block mb-1 text-sm text-gray-300">Email</label>
        <input type="email" name="email" class="w-full rounded-md px-3 py-2 focus:ring-2 focus:ring-cyan-500 outline-none" required>
      </div>
      <button type="submit" class="w-full bg-cyan-500 hover:bg-cyan-600 text-white px-4 py-2 rounded-lg shadow-lg transition transform hover:scale-105">Add</button>
    </form>
    <div class="mt-4 text-center">
      <a href="/students/index" class="text-cyan-400 hover:underline text-sm">⬅ Back to Dashboard</a>
    </div>
  </div>
</body>
</html>
