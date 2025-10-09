<?php
// views/user_auth/login.php
// session_start();
$error = $error ?? null;
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login — MyApp</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <style>body { font-family: 'Inter', ui-sans-serif, system-ui; }</style>
</head>
<body class="min-h-screen bg-slate-50 flex items-center justify-center py-12">
  <div class="w-full max-w-sm bg-white rounded-2xl shadow p-6">
    <h1 class="text-xl font-semibold text-slate-800 text-center mb-4">Login to MyApp</h1>

    <?php if(isset($error)): ?>
      <div class="mb-4 text-center text-sm text-red-700 bg-red-50 border border-red-100 px-3 py-2 rounded"><?= htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <form action="<?= site_url('login'); ?>" method="post" autocomplete="on" class="space-y-4">
      <div>
        <label for="name" class="block text-sm text-slate-700">Username or Email</label>
        <input id="name" name="name" type="text" required autocomplete="name" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200" />
      </div>

      <div>
        <label for="password" class="block text-sm text-slate-700">Password</label>
        <div class="relative">
          <input id="password" name="password" type="password" required autocomplete="current-password" class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-indigo-200" />
          <button type="button" id="togglePassword" class="absolute right-2 top-1/2 -translate-y-1/2 text-slate-400" aria-label="Show password">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
          </button>
        </div>
      </div>

      <div>
        <button type="submit" class="w-full py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white font-semibold">Login</button>
      </div>
    </form>

    <p class="mt-4 text-center text-sm text-slate-600">Don't have an account? <a href="<?= site_url('register'); ?>" class="text-indigo-600 hover:underline">Register</a></p>
  </div>

  <script>
    const toggleBtn = document.getElementById('togglePassword');
    const pwd = document.getElementById('password');
    toggleBtn?.addEventListener('click', () => {
      const isHidden = pwd.type === 'password';
      pwd.type = isHidden ? 'text' : 'password';
      toggleBtn.setAttribute('aria-pressed', String(isHidden));
    });
  </script>
</body>
</html>
