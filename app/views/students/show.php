<?php
// views/students/show.php
// session_start();
// variables expected: $users (array), $page (pagination html), $_SESSION['role']
$current_role = $_SESSION['role'] ?? '';
$q = $_GET['q'] ?? '';
function e($v) { return htmlspecialchars($v); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>User Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <style>body { font-family: 'Inter', ui-sans-serif, system-ui; }</style>
</head>
<body class="min-h-screen bg-slate-50 py-10">
  <div class="max-w-6xl mx-auto px-6">
    <header class="flex items-center justify-between mb-6">
      <h1 class="text-2xl font-semibold text-slate-800">User Dashboard</h1>
      <div class="flex items-center gap-3">
        <form action="<?= site_url('users/show'); ?>" method="get" class="flex gap-2">
          <input id="q" name="q" value="<?= e($q); ?>" placeholder="Search records..." class="rounded-lg border border-slate-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200" />
          <button type="submit" class="rounded-lg px-4 py-2 bg-indigo-600 text-white">Search</button>
        </form>
        <?php if ($current_role === 'admin'): ?>
          <a href="<?= site_url('users/create'); ?>" class="rounded-lg px-4 py-2 bg-green-50 text-green-700 border border-green-100 hover:bg-green-100">Create</a>
        <?php endif; ?>
      </div>
    </header>

    <div class="bg-white rounded-2xl shadow overflow-x-auto">
      <table class="min-w-full divide-y divide-slate-100">
        <thead class="bg-slate-50">
          <tr>
            <th class="px-4 py-3 text-left text-xs font-medium text-slate-600 uppercase">ID</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-slate-600 uppercase">Last Name</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-slate-600 uppercase">First Name</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-slate-600 uppercase">Email</th>
            <?php if ($current_role === 'admin'): ?>
              <th class="px-4 py-3 text-left text-xs font-medium text-slate-600 uppercase">Action</th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-slate-100">
          <?php foreach (html_escape($users) as $user): ?>
            <tr>
              <td class="px-4 py-3 text-sm text-slate-700"><?= e($user['id']); ?></td>
              <td class="px-4 py-3 text-sm text-slate-700"><?= e($user['last_name']); ?></td>
              <td class="px-4 py-3 text-sm text-slate-700"><?= e($user['first_name']); ?></td>
              <td class="px-4 py-3 text-sm text-slate-700"><?= e($user['email']); ?></td>
              <?php if ($current_role === 'admin'): ?>
                <td class="px-4 py-3 text-sm text-slate-700">
                  <a href="<?= site_url('users/update/'.$user['id']); ?>" class="text-indigo-600 hover:underline mr-3">Update</a>
                  <a href="<?= site_url('users/delete/'.$user['id']); ?>" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                </td>
              <?php endif; ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="mt-6 flex justify-center">
      <nav class="inline-flex space-x-2">
        <?php if (isset($page)) echo $page; ?>
      </nav>
    </div>

    <div class="mt-6 text-right">
      <?php if (isset($_SESSION['user_id'])): ?>
        <form action="<?= site_url('logout'); ?>" method="post">
          <button type="submit" class="rounded-lg px-4 py-2 bg-red-50 text-red-700 border border-red-100">Logout</button>
        </form>
      <?php endif; ?>
    </div>
  </div>
</body>
</html>
