<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: linear-gradient(135deg, #0f172a, #1e293b);
      color: #e2e8f0;
      font-family: 'Inter', sans-serif;
    }
    .glass {
      background: rgba(30, 41, 59, 0.7);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(148, 163, 184, 0.2);
    }
    th {
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #94a3b8;
    }
    td input {
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(148,163,184,0.2);
      color: #e2e8f0;
    }
  </style>
</head>
<body>
  <div class="max-w-6xl mx-auto py-12">
    <h1 class="text-5xl font-extrabold text-center mb-10 tracking-tight text-cyan-400 drop-shadow-lg">
       Student Dashboard
    </h1>

    <div class="flex justify-between mb-6">
      <a href="/students/create" 
         class="bg-cyan-500 hover:bg-cyan-600 text-white px-5 py-2 rounded-full shadow-lg transition transform hover:scale-105">
         + Add Student
      </a>
      <a href="/students/delete_all" 
         onclick="return confirm('⚠️ Delete ALL students?')" 
         class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-full shadow-lg transition transform hover:scale-105">
          Delete All
      </a>
    </div>

    <!-- 🔍 Search Form -->
    <form method="GET" action="/students/index" class="mb-6 flex space-x-2">
      <input type="text" name="search" value="<?= htmlspecialchars($search ?? '') ?>"
             placeholder="Search students..."
             class="px-4 py-2 rounded-md bg-slate-700 text-white focus:ring-2 focus:ring-cyan-500 outline-none w-64" />
      <button type="submit" class="bg-cyan-500 hover:bg-cyan-600 px-4 py-2 rounded-md text-white">
        Search
      </button>
      <?php if (!empty($search)): ?>
        <a href="/students/index" class="bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded-md text-white">Clear</a>
      <?php endif; ?>
    </form>

    <div class="overflow-hidden rounded-2xl glass shadow-xl">
      <table class="w-full border-collapse text-sm">
        <thead class="bg-slate-800/50">
          <tr>
            <th class="p-4">ID</th>
            <th class="p-4">Last Name</th>
            <th class="p-4">First Name</th>
            <th class="p-4">Email</th>
            <th class="p-4 text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($students as $student): ?>
          <tr class="border-t border-slate-700 hover:bg-slate-700/40 transition">
            <form action="/students/inline_update/<?= $student['id'] ?>" method="POST" class="contents">
              <td class="p-4 font-semibold"><?= $student['id'] ?></td>
              <td class="p-4">
                <input type="text" name="last_name" value="<?= $student['last_name'] ?>" 
                       class="w-full rounded-md px-2 py-1 focus:ring-2 focus:ring-cyan-500 outline-none">
              </td>
              <td class="p-4">
                <input type="text" name="first_name" value="<?= $student['first_name'] ?>" 
                       class="w-full rounded-md px-2 py-1 focus:ring-2 focus:ring-cyan-500 outline-none">
              </td>
              <td class="p-4">
                <input type="email" name="email" value="<?= $student['email'] ?>" 
                       class="w-full rounded-md px-2 py-1 focus:ring-2 focus:ring-cyan-500 outline-none">
              </td>
              <td class="p-4 text-center space-x-3">
                <button type="submit" 
                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-1 rounded-full shadow-md transition transform hover:scale-110">
                  Save
                </button>
                <a href="/students/inline_delete/<?= $student['id'] ?>" 
                   onclick="return confirm('Delete this student?')" 
                   class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded-full shadow-md transition transform hover:scale-110">
                   Delete
                </a>
              </td>
            </form>
          </tr>
          <?php endforeach; ?>
          <?php if(empty($students)): ?>
          <tr>
            <td colspan="5" class="text-center py-6 text-gray-400">No students found</td>
          </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <!-- 📄 Pagination -->
    <div class="flex items-center justify-between mt-6">
      <div class="text-sm text-gray-400">
        Showing <?= ($offset + 1) ?> to <?= min($offset + count($students), $total) ?> of <?= $total ?> students
      </div>

      <div class="flex space-x-2">
        <?php if ($page > 1): ?>
          <a href="/students/index?page=<?= $page-1 ?>&search=<?= urlencode($search) ?>"
             class="px-3 py-1 bg-slate-700 rounded hover:bg-slate-600">Prev</a>
        <?php endif; ?>

        <?php for ($p = 1; $p <= $total_pages; $p++): ?>
          <a href="/students/index?page=<?= $p ?>&search=<?= urlencode($search) ?>"
             class="px-3 py-1 rounded <?= ($p == $page) ? 'bg-cyan-500 text-white' : 'bg-slate-700 text-gray-200 hover:bg-slate-600' ?>">
            <?= $p ?>
          </a>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
          <a href="/students/index?page=<?= $page+1 ?>&search=<?= urlencode($search) ?>"
             class="px-3 py-1 bg-slate-700 rounded hover:bg-slate-600">Next</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</body>
</html>
