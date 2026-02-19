<?php include_once __DIR__ . "/process.php" ?>
<?php include_once __DIR__ . "/partials/header.php" ?>

  <!-- List View (default) -->
  <div class="list-view active glass rounded-2xl overflow-hidden">
    <table class="w-full text-sm">
      <thead class="bg-black/20 border-b border-cyan-500/10">
        <tr>
          <th class="px-8 py-5 text-left font-semibold uppercase tracking-wider text-xs muted-text">Name</th>
          <th class="px-8 py-5 text-left font-semibold uppercase tracking-wider text-xs muted-text w-32">Size</th>
          <th class="px-8 py-5 text-left font-semibold uppercase tracking-wider text-xs muted-text w-44">Last Modified</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($items as $item): ?>
          <tr class="border-t border-cyan-500/5 row-hover">
            <td class="px-8 py-5 font-medium"><a href='http://<?= $_SERVER["HTTP_HOST"] . $item["url"] ?>' class="accent-text hover:underline"><?= htmlspecialchars($item["entry"]) ?></a></td>
            <td class="px-8 py-5 muted-text"><?= isset($item["size"]) ? $item["size"] : "NAN" ?></td>
            <td class="px-8 py-5 muted-text"><?= $item["mtime"] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Grid View -->
  <div class="grid-view hidden grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-2">
      <?php foreach($items as $item): ?>
          <a href='http://<?= $_SERVER["HTTP_HOST"] . $item["url"] ?>' class="glass p-7 rounded-2xl card-hover transition-all duration-300 flex flex-col gap-4 border border-cyan-500/10 hover:border-cyan-400/40">
            <div class="text-5xl opacity-80"><?= ($item["is_dir"] ? "📁" : "📄") ?></div>
            <div class="font-semibold text-xl truncate"><?= htmlspecialchars($item["entry"]) ?></div>
            <div class="text-sm muted-text"><?= isset($item["size"]) ? $item["size"] . " • " : null ?> <?= $item["mtime"] ?></div>
          </a>
      <?php endforeach; ?>
  </div>

<?php include_once __DIR__ . "/partials/footer.php" ?>