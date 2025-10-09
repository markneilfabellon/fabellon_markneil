<?php
function old($k){ return htmlspecialchars($_POST[$k]??'',ENT_QUOTES); }
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<title>Create User</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
<style>body{font-family:'Montserrat',sans-serif;}</style>
</head>
<body class="min-h-screen bg-indigo-50 flex items-center justify-center p-6">

<div class="w-full max-w-md bg-yellow-400 border-4 border-indigo-900 rounded-2xl p-6 shadow-lg">
<h1 class="text-3xl font-extrabold text-indigo-900 mb-4 text-center">Create User</h1>
<form action="<?= site_url('users/create'); ?>" method="post" class="space-y-4">
  <input name="last_name" placeholder="Last Name" type="text" value="<?= old('last_name'); ?>" required class="w-full rounded-lg px-4 py-2 border-4 border-indigo-900 font-bold text-indigo-900 focus:ring-4 focus:ring-yellow-300"/>
  <input name="first_name" placeholder="First Name" type="text" value="<?= old('first_name'); ?>" required class="w-full rounded-lg px-4 py-2 border-4 border-indigo-900 font-bold text-indigo-900 focus:ring-4 focus:ring-yellow-300"/>
  <input name="email" placeholder="Email" type="email" value="<?= old('email'); ?>" required class="w-full rounded-lg px-4 py-2 border-4 border-indigo-900 font-bold text-indigo-900 focus:ring-4 focus:ring-yellow-300"/>
  <button type="submit" class="w-full py-3 bg-indigo-900 hover:bg-yellow-400 hover:text-indigo-900 text-yellow-50 font-extrabold rounded-lg shadow-lg transition-all">Submit</button>
</form>
<a href="<?= site_url('users/show'); ?>" class="mt-4 inline-block text-indigo-900 font-bold hover:underline">← Back to list</a>
</div>
</body>
</html>
