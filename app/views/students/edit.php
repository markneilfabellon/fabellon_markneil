<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit - Student CRUD</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-yellow-900 to-orange-900 min-h-screen flex items-center justify-center font-mono">
  <div class="max-w-md w-full bg-gray-900 border-4 border-yellow-400 rounded-xl shadow-2xl p-6 text-yellow-200">
    <h1 class="text-3xl font-extrabold text-center mb-6 text-yellow-300">✏️ Edit Student</h1>
    <form action="/students/update/<?= $student['id'] ?>" method="POST" class="space-y-5">
      <div>
        <label class="block mb-1">Last Name</label>
        <input type="text" name="last_name" value="<?= $student['last_name'] ?>" required class="w-full border-2 border-yellow-400 bg-gray-800 text-yellow-200 px-3 py-2 rounded-lg">
      </div>
      <div>
        <label class="block mb-1">First Name</label>
        <input type="text" name="first_name" value="<?= $student['first_name'] ?>" required class="w-full border-2 border-yellow-400 bg-gray-800 text-yellow-200 px-3 py-2 rounded-lg">
      </div>
      <div>
        <label class="block mb-1">Email</label>
        <input type="email" name="email" value="<?= $student['email'] ?>" required class="w-full border-2 border-yellow-400 bg-gray-800 text-yellow-200 px-3 py-2 rounded-lg">
      </div>
      <div class="flex justify-between">
        <a href="/students/index" class="bg-gray-700 px-4 py-2 rounded-lg">Cancel</a>
        <button type="submit" class="bg-yellow-500 px-4 py-2 rounded-lg">Update</button>
      </div>
    </form>
  </div>
</body>
</html>
