<?php
// views/students/update.php
// session_start();
// variable expected: $user (assoc)
function e($v) { return htmlspecialchars($v, ENT_QUOTES); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Update User </title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <style>body { font-family: 'Inter', ui-sans-serif, system-ui; }</style>
</head>
<body class="min-h-screen bg-slate-50 flex items-center justify-center py-12">
  <div class="w-full max-w-md bg-white rounded-2xl shadow p-6">
    <h1 class="text-xl font-semibold text-slate-800 mb-4">Update User</h1>

    <form action="<?= site_url('users/update/'.$user['id']); ?>" method="post" class="space-y-4">
      <div>
        <label for="last_name" class="block text-sm text-slate-700">Last Name</label>
        <input id="last_name" name="last_name" type="text" required value="<?= e($user['last_name']); ?>" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200" />
      </div>

      <div>
        <label for="first_name" class="block text-sm text-slate-700">First Name</label>
        <input id="first_name" name="first_name" type="text" required value="<?= e($user['first_name']); ?>" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200" />
      </div>

      <div>
        <label for="email" class="block text-sm text-slate-700">Email</label>
        <input id="email" name="email" type="email" required value="<?= e($user['email']); ?>" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200" />
      </div>

      <div>
        <button type="submit" class="w-full py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white font-semibold">Update Record</button>
      </div>
    </form>

    <a href="<?= site_url('users/show'); ?>" class="mt-4 inline-block text-sm text-slate-600 hover:underline">← Back to list</a>
  </div>
</body>
</html>
`