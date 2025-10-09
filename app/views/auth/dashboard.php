<?php
$user=$_SESSION['user']??null;
if(!$user){header('Location:/auth/login.php');exit;}
$name=is_array($user)?($user['name']??$user['email']??'User'):($user->name??$user->email??'User');
?>
<!doctype html>
<html lang="en"><head><meta charset="utf-8"/><meta name="viewport" content="width=device-width,initial-scale=1"/>
<title>Dashboard — MyApp</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<style>body{font-family:'Inter',ui-sans-serif,system-ui}</style></head>
<body class="min-h-screen bg-[#F1F5F9] text-[#1E293B]">
<div class="max-w-6xl mx-auto px-6 py-10">
<header class="flex items-center justify-between mb-8">
<h1 class="text-3xl font-extrabold">MyApp Dashboard</h1>
<div class="flex items-center gap-4 text-sm"><div>Signed in as <span class="font-bold"><?=htmlspecialchars($name)?></span></div>
<a href="/auth/logout.php" class="inline-flex items-center gap-2 px-3 py-2 rounded-md bg-[#F43F5E] text-white font-semibold shadow-[4px_4px_0_0_#1E293B] hover:-translate-y-1 hover:shadow-[6px_6px_0_0_#1E293B] transition-transform duration-150">Logout</a></div></header>
<main class="grid grid-cols-1 md:grid-cols-3 gap-6">
<section class="md:col-span-2 bg-white border-[3px] border-black/10 rounded-xl shadow-[4px_4px_0_0_#1E293B] p-6 hover:-translate-y-1 hover:shadow-[6px_6px_0_0_#1E293B] transition-transform duration-150">
<h2 class="text-xl font-bold">Overview</h2>
<p class="mt-2 text-slate-600">Welcome back, <?=$name?>. Here's your account snapshot.</p>
<div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
<?php
$cards=[['Active projects','3','#14B8A6'],['Messages','12','#F43F5E'],['Notifications','4','#FBBF24']];
foreach($cards as[$label,$num,$color]):?>
<div class="p-4 rounded-md border-[3px] border-black/10 bg-white shadow-[3px_3px_0_0_#1E293B] hover:-translate-y-1 hover:shadow-[6px_6px_0_0_#1E293B] transition-transform duration-150">
<div class="text-sm font-medium text-[#1E293B]"><?=$label?></div>
<div class="mt-1 text-3xl font-extrabold" style="color:<?=$color?>"><?=$num?></div></div>
<?php endforeach;?>
</div>
<div class="mt-6"><h3 class="text-md font-bold">Recent activity</h3>
<ul class="mt-3 space-y-3 text-slate-700"><li class="p-3 rounded-md border-[3px] border-black/10 bg-white shadow-[3px_3px_0_0_#1E293B]">You updated your profile <span class="text-xs text-slate-500">2 days ago</span></li>
<li class="p-3 rounded-md border-[3px] border-black/10 bg-white shadow-[3px_3px_0_0_#1E293B]">New comment on your post <span class="text-xs text-slate-500">4 days ago</span></li>
<li class="p-3 rounded-md border-[3px] border-black/10 bg-white shadow-[3px_3px_0_0_#1E293B]">Password changed <span class="text-xs text-slate-500">1 week ago</span></li></ul></div></section>
<aside class="bg-white border-[3px] border-black/10 rounded-xl shadow-[4px_4px_0_0_#1E293B] p-6 hover:-translate-y-1 hover:shadow-[6px_6px_0_0_#1E293B] transition-transform duration-150">
<h3 class="text-md font-bold">Account</h3>
<dl class="text-sm mt-3 space-y-2"><dt class="font-semibold">Email</dt><dd><?=htmlspecialchars(is_array($user)?($user['email']??'-'):($user->email??'-'))?></dd>
<dt class="font-semibold">Member since</dt><dd><?=htmlspecialchars(is_array($user)?($user['created_at']??'-'):($user->created_at??'-'))?></dd>
<dt class="font-semibold">Role</dt><dd><?=htmlspecialchars(is_array($user)?($user['role']??'User'):($user->role??'User'))?></dd></dl>
<div class="mt-4"><a href="/auth/profile.php" class="block text-center py-2 rounded-md bg-[#14B8A6] text-white font-bold shadow-[4px_4px_0_0_#1E293B] hover:-translate-y-1 hover:shadow-[6px_6px_0_0_#1E293B] transition-transform duration-150">Manage profile</a></div></aside></main>
<footer class="mt-8 text-center text-slate-600 text-sm">&copy; <?=date('Y')?> MyApp</footer></div></body></html>
