<?php defined("BASE_PATH") || die("Permission defined!")  ?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth" data-theme="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Directory Index " <?= htmlspecialchars($request["path"]) ?></title>

  <!-- Tailwind CSS CDN -->
  <script src="/tailwind/4.2.2/tailwind.js"></script>
  <style>
    [data-theme="dark"] {
      --bg:       #0a0f1a;
      --surface:  #111827;
      --surface2: #1e293b;
      --text:     #e2e8f0;
      --muted:    #94a3b8;
      --border:   rgba(148,163,184,0.12);
      --accent:   #67e8f9;     /* cyan-teal glow */
      --accent-dim: #22d3ee;
      --glow:     rgba(103,232,249,0.08);
    }

    body {
      background: var(--bg);
      color: var(--text);
      font-feature-settings: "cv02", "liga" 1, "calt" 1;
    }

    .glass {
      background: rgba(30,41,59,0.65);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      border: 1px solid var(--border);
      box-shadow: 0 10px 40px -8px var(--glow);
    }

    .row-hover:hover {
      background: rgba(103,232,249,0.06);
      transform: translateX(4px);
      transition: all 0.22s ease;
    }

    .card-hover:hover {
      transform: translateY(-6px);
      box-shadow: 0 24px 48px -12px var(--glow);
      border-color: rgba(103,232,249,0.3);
    }

    .accent-text  { color: var(--accent); }
    .muted-text   { color: var(--muted); }

    @media (max-width: 768px) {
      .list-view table,
      .list-view thead,
      .list-view tbody,
      .list-view th,
      .list-view td,
      .list-view tr { display: block; }

      .list-view thead tr { position: absolute; top: -9999px; left: -9999px; }

      .list-view tr {
        margin-bottom: 1.25rem;
        border-radius: 1rem;
        overflow: hidden;
      }

      .list-view td {
        display: block;
        border: none;
        position: relative;
        padding: 1rem 1.25rem 1rem 48%;
        text-align: right;
      }

      .list-view td::before {
        content: attr(data-label);
        position: absolute;
        left: 1.25rem;
        width: 42%;
        font-weight: 600;
        color: var(--accent-dim);
        text-align: left;
      }
    }
  </style>
</head>
<body class="min-h-screen font-['Inter',system-ui,sans-serif] antialiased selection:bg-cyan-900/40">
<div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-14">

  <!-- Header -->
  <header class="mb-12">
    <div class="flex items-center justify-between gap-6 flex-wrap">
      <div>
        <h1 class="text-4xl sm:text-5xl font-bold tracking-tight bg-gradient-to-r from-cyan-300 to-teal-400 bg-clip-text text-transparent">
          Directory Index
        </h1>
        <p class="mt-3 text-lg muted-text">
          <?= htmlspecialchars($request["path"]) ?>
        </p>
      </div>

      <div class="inline-flex rounded-full border border-cyan-500/20 bg-cyan-950/30 backdrop-blur-sm">
        <button data-view="list" class="view-btn px-7 py-3 text-sm font-medium bg-cyan-600/80 text-white rounded-full transition-all shadow-inner shadow-cyan-900/40">
          List View
        </button>
        <button data-view="grid" class="view-btn px-7 py-3 text-sm rounded-full font-medium text-cyan-300 hover:text-white transition-all">
          Grid View
        </button>
      </div>
    </div>

    <div class="mt-5 text-sm muted-text flex gap-6 flex-wrap">
      <div><?= count($entries) ?> entries</div>
      <div><?= count(array_filter($items, fn($item) => $item["is_dir"])); ?> directories " <?= count(array_filter($items, fn($item) => !$item["is_dir"])); ?> files</div>
      <div>Last indexed: <?= end($items)["mtime"]; ?></div>
    </div>
  </header>