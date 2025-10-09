<?php
$flash = $_SESSION['flash'] ?? null;
if (isset($_SESSION['flash'])) unset($_SESSION['flash']);
function old($key){return htmlspecialchars($_POST[$key]??'',ENT_QUOTES);}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8"/><meta name="viewport" content="width=device-width,initial-scale=1"/>
<title>Register — MyApp</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<style>body{font-family:'Inter',ui-sans-serif,system-ui}</style>
</head>
<body class="min-h-screen bg-[#F1F5F9] flex items-center justify-center py-12">
<div class="w-full max-w-xl mx-auto px-6">
  <div class="bg-white rounded-xl border-[3px] border-black/10 shadow-[4px_4px_0_0_#1E293B] p-8 hover:-translate-y-1 hover:shadow-[6px_6px_0_0_#1E293B] transition-transform duration-150">
    <header class="mb-6 text-center">
      <h1 class="text-3xl font-extrabold text-[#1E293B] mb-2">Create your MyApp account</h1>
      <p class="text-sm text-slate-600">Professional accounts for your team.</p>
    </header>
    <?php if(!empty($flash)):?><div class="mb-4 px-4 py-3 rounded bg-green-100 border-l-4 border-green-500 text-green-800 font-medium"><?=htmlspecialchars($flash)?></div><?php endif;?>
    <form action="/auth/register.php" method="post" class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div><label for="name" class="block text-sm font-semibold text-[#1E293B]">Full name</label><input id="name" name="name" type="text" required value="<?=old('name');?>" class="mt-1 w-full rounded-md border-[3px] border-black/10 px-3 py-2 focus:ring-2 focus:ring-[#14B8A6]"/></div>
      <div><label for="email" class="block text-sm font-semibold text-[#1E293B]">Email</label><input id="email" name="email" type="email" required value="<?=old('email');?>" class="mt-1 w-full rounded-md border-[3px] border-black/10 px-3 py-2 focus:ring-2 focus:ring-[#14B8A6]"/></div>
      <div><label for="password" class="block text-sm font-semibold text-[#1E293B]">Password</label><input id="password" name="password" type="password" required class="mt-1 w-full rounded-md border-[3px] border-black/10 px-3 py-2 focus:ring-2 focus:ring-[#14B8A6]"/></div>
      <div><label for="password_confirm" class="block text-sm font-semibold text-[#1E293B]">Confirm password</label><input id="password_confirm" name="password_confirm" type="password" required class="mt-1 w-full rounded-md border-[3px] border-black/10 px-3 py-2 focus:ring-2 focus:ring-[#14B8A6]"/></div>
      <div class="md:col-span-2 flex items-center gap-3"><input id="tos" name="tos" type="checkbox" class="h-4 w-4 rounded border-[#1E293B]" required/><label for="tos" class="text-sm text-[#1E293B]">I agree to the <a href="/terms" class="text-[#F43F5E] font-semibold hover:underline">Terms of Service</a></label></div>
      <div class="md:col-span-2"><button type="submit" class="w-full py-2 rounded-md bg-[#14B8A6] text-white font-bold shadow-[4px_4px_0_0_#1E293B] hover:-translate-y-1 hover:shadow-[6px_6px_0_0_#1E293B] transition-transform duration-150">Create account</button></div>
    </form>
    <p class="mt-4 text-center text-sm text-[#1E293B]">Already have an account? <a href="/auth/login.php" class="text-[#F43F5E] font-semibold hover:underline">Sign in</a></p>
  </div>
</div>
</body>
</html>
