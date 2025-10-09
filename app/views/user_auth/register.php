<?php
// views/user_auth/register.php
// session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Register — MyApp</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <style>body { font-family: 'Inter', ui-sans-serif, system-ui; }</style>
</head>
<body class="min-h-screen bg-slate-50 flex items-center justify-center py-12">
  <div class="w-full max-w-md bg-white rounded-2xl shadow p-6">
    <h1 class="text-xl font-semibold text-slate-800 mb-4 text-center">Create an Account</h1>

    <form action="<?= site_url('register'); ?>" method="post" class="space-y-4">
      <div>
        <label class="block text-sm text-slate-700">Full Name</label>
        <input name="name" type="text" required class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200" />
      </div>

      <div>
        <label class="block text-sm text-slate-700">Email</label>
        <input name="email" type="email" required class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200" />
      </div>

      <div>
        <label class="block text-sm text-slate-700">Password</label>
        <input name="password" type="password" required class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200" />
      </div>

      <div>
        <button type="submit" class="w-full py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white font-semibold">Register</button>
      </div>
    </form>

    <p class="mt-4 text-center text-sm text-slate-600">Already registered? <a href="<?= site_url('login'); ?>" class="text-indigo-600 hover:underline">Sign in</a></p>
  </div>
</body>
</html>
