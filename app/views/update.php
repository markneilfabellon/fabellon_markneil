<?php
// views/update.php
// session_start(); // Uncomment if sessions are not started elsewhere

$flash = $_SESSION['flash'] ?? null;
if (isset($_SESSION['flash'])) { unset($_SESSION['flash']); }

// Example: $record should be provided by the controller (associative array or object)
$record = $record ?? ($_POST['record'] ?? null);

function old($key, $fallback = '') {
    if (isset($_POST[$key])) return htmlspecialchars($_POST[$key], ENT_QUOTES);
    global $record;
    if (is_array($record) && isset($record[$key])) return htmlspecialchars($record[$key], ENT_QUOTES);
    if (is_object($record) && isset($record->$key)) return htmlspecialchars($record->$key, ENT_QUOTES);
    return htmlspecialchars($fallback, ENT_QUOTES);
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Update — MyApp</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-indigo-900 to-sky-900 text-gray-100">
  <div class="max-w-5xl mx-auto px-4 py-10">
    <header class="flex items-center justify-between mb-8">
      <div class="flex items-center gap-3">
        <a href="/index.html" class="text-2xl font-bold">MyApp</a>
        <span class="text-sm text-slate-300">/ Update</span>
      </div>
      <nav class="flex items-center gap-3">
        <a href="/auth/dashboard.php" class="text-sm text-slate-300 hover:text-white">Dashboard</a>
        <a href="/auth/logout.php" class="text-sm px-3 py-2 rounded bg-rose-600 hover:bg-rose-700 text-white">Logout</a>
      </nav>
    </header>

    <main class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <section class="md:col-span-2 bg-white/5 p-6 rounded-2xl border border-white/10 shadow">
        <div class="flex items-center justify-between mb-4">
          <h1 class="text-xl font-semibold">Update Record</h1>
          <a href="/index.html" class="text-sm text-slate-300 hover:underline">Back to list</a>
        </div>

        <?php if (!empty($flash)): ?>
          <div class="mb-4 p-3 rounded bg-emerald-800/40 text-emerald-200"><?php echo htmlspecialchars($flash); ?></div>
        <?php endif; ?>

        <?php if (!empty($errors) && is_array($errors)): ?>
          <div class="mb-4 p-3 rounded bg-red-800/30 text-red-200">
            <ul class="list-disc list-inside">
              <?php foreach ($errors as $err): ?>
                <li><?php echo htmlspecialchars(is_array($err) ? implode(' ', $err) : $err); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <!-- Update form: expects an identifier like id in $record or GET param -->
        <form action="/update.php" method="post" class="space-y-4">
          <input type="hidden" name="id" value="<?php echo old('id', $record['id'] ?? $record->id ?? ''); ?>" />

          <div>
            <label for="title" class="block text-sm text-slate-300 mb-1">Title</label>
            <input id="title" name="title" required
                   class="w-full px-4 py-2 rounded-lg bg-white/5 border border-white/10 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                   value="<?php echo old('title', ''); ?>" />
          </div>

          <div>
            <label for="description" class="block text-sm text-slate-300 mb-1">Description</label>
            <textarea id="description" name="description" rows="6" required
                      class="w-full px-4 py-3 rounded-lg bg-white/5 border border-white/10 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"><?php echo old('description', ''); ?></textarea>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label for="category" class="block text-sm text-slate-300 mb-1">Category</label>
              <input id="category" name="category"
                     class="w-full px-4 py-2 rounded-lg bg-white/5 border border-white/10 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                     value="<?php echo old('category', ''); ?>" />
            </div>
            <div>
              <label for="date" class="block text-sm text-slate-300 mb-1">Date</label>
              <input id="date" name="date" type="date"
                     class="w-full px-4 py-2 rounded-lg bg-white/5 border border-white/10 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
                     value="<?php echo old('date', ''); ?>" />
            </div>
          </div>

          <div class="flex items-center gap-3">
            <button type="submit" class="px-5 py-2 rounded-lg bg-indigo-500 hover:bg-indigo-600 text-white font-medium shadow">Save changes</button>
            <a href="/index.html" class="px-4 py-2 rounded-lg border border-white/10 text-slate-300 hover:bg-white/5">Cancel</a>
          </div>
        </form>
      </section>

      <aside class="bg-white/6 p-6 rounded-2xl border border-white/10 shadow">
        <h3 class="text-md font-semibold mb-2">Record details</h3>
        <dl class="text-sm text-slate-300">
          <dt class="font-medium">ID</dt>
          <dd class="mb-3"><?php echo htmlspecialchars($record['id'] ?? $record->id ?? '-'); ?></dd>

          <dt class="font-medium">Created</dt>
          <dd class="mb-3"><?php echo htmlspecialchars($record['created_at'] ?? '-'); ?></dd>

          <dt class="font-medium">Last updated</dt>
          <dd class="mb-3"><?php echo htmlspecialchars($record['updated_at'] ?? '-'); ?></dd>
        </dl>

        <div class="mt-4">
          <form action="/delete.php" method="post" onsubmit="return confirm('Are you sure you want to delete this record?');">
            <input type="hidden" name="id" value="<?php echo old('id', $record['id'] ?? $record->id ?? ''); ?>" />
            <button type="submit" class="w-full py-2 rounded-lg bg-rose-600 hover:bg-rose-700 text-white">Delete record</button>
          </form>
        </div>
      </aside>
    </main>

    <footer class="mt-8 text-center text-slate-400 text-sm">
      &copy; <?php echo date('Y'); ?> MyApp
    </footer>
  </div>
</body>
</html>
