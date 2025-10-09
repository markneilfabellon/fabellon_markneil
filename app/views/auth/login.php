<?php
$flash = $_SESSION['flash'] ?? null;
if (isset($_SESSION['flash'])) unset($_SESSION['flash']);
function old($key) { return htmlspecialchars($_POST[$key] ?? '', ENT_QUOTES); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login — MyApp</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>body{font-family:'Inter',ui-sans-serif,system-ui}</style>
</head>
<body class="min-h-screen bg-[#F1F5F9] flex items-center justify-center py-12">
  <div class="w-full max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 px-6">
    <section class="hidden md:flex items-center justify-center">
      <div class="w-full max-w-md bg-[#14B8A6] text-white rounded-xl border-[3px] border-black/10 p-8 shadow-[4px_4px_0_0_#1E293B] hover:-translate-y-1 hover:shadow-[6px_6px_0_0_#1E293B] transition-transform duration-150">
        <h1 class="text-3xl font-extrabold mb-4">Welcome to <span class="text-[#FBBF24]">MyApp</span></h1>
        <p class="text-sm leading-relaxed opacity-90">Sign in to manage your dashboard, stay productive, and track your progress with confidence.</p>
        <ul class="mt-6 space-y-2 text-sm">
          <li class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-[#F43F5E]"></span> Secure authentication</li>
          <li class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-[#FBBF24]"></span> Clean, bold UI</li>
          <li class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-white"></span> Fast and responsive</li>
        </ul>
      </div>
    </section>
    <section class="w-full">
      <div class="bg-white rounded-xl border-[3px] border-black/10 shadow-[4px_4px_0_0_#1E293B] p-8 hover:-translate-y-1 hover:shadow-[6px_6px_0_0_#1E293B] transition-transform duration-150">
        <header class="mb-5 text-center">
          <h2 class="text-2xl font-bold text-[#1E293B]">Sign in to MyApp</h2>
          <p class="text-sm text-slate-600 mt-1">Enter your credentials to continue</p>
        </header>
        <?php if (!empty($flash)): ?>
          <div class="mb-4 px-4 py-3 rounded bg-green-100 border-l-4 border-green-500 text-green-800 font-medium"><?= htmlspecialchars($flash) ?></div>
        <?php endif; ?>
        <?php if (!empty($errors) && is_array($errors)): ?>
          <div class="mb-4 px-4 py-3 rounded bg-red-100 border-l-4 border-red-500 text-red-800 font-medium">
            <ul class="list-disc list-inside"><?php foreach ($errors as $err): ?><li><?= htmlspecialchars(is_array($err)?implode(' ',$err):$err) ?></li><?php endforeach; ?></ul>
          </div>
        <?php endif; ?>
        <form action="/auth/login.php" method="post" class="space-y-4">
          <div><label for="email" class="block text-sm font-semibold text-[#1E293B]">Email</label>
            <input id="email" name="email" type="email" required value="<?= old('email'); ?>" class="mt-1 w-full rounded-md border-[3px] border-black/10 px-4 py-2 bg-white text-[#1E293B] focus:ring-2 focus:ring-[#14B8A6]" />
          </div>
          <div><label for="password" class="block text-sm font-semibold text-[#1E293B]">Password</label>
            <input id="password" name="password" type="password" required class="mt-1 w-full rounded-md border-[3px] border-black/10 px-4 py-2 bg-white text-[#1E293B] focus:ring-2 focus:ring-[#14B8A6]" />
          </div>
          <div class="flex items-center justify-between text-sm text-[#1E293B]">
            <label class="inline-flex items-center gap-2"><input type="checkbox" name="remember" class="h-4 w-4 rounded border-[#1E293B]" />Remember me</label>
            <a href="/auth/forgot.php" class="text-[#F43F5E] font-semibold hover:underline">Forgot password?</a>
          </div>
          <div><button type="submit" class="w-full py-2 rounded-md bg-[#14B8A6] text-white font-bold shadow-[4px_4px_0_0_#1E293B] hover:-translate-y-1 hover:shadow-[6px_6px_0_0_#1E293B] transition-transform duration-150">Sign In</button></div>
        </form>
        <p class="mt-4 text-center text-sm text-[#1E293B]">Don't have an account? <a href="/auth/register.php" class="text-[#F43F5E] font-semibold hover:underline">Create one</a></p>
      </div>
    </section>
  </div>
</body>
</html>
