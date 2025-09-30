<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Wise</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-stone-950 text-stone-200">

  <?php include('./views/components/header.php'); ?>

  <main class="mx-auto max-w-screen-lg py-4 space-y-6">
    <?php if ($message = flash()->get('message')): ?>
      <div class="w-full font-semibold text-sm border-2 border-green-800 bg-green-900 text-green-400 rounded-md px-5 py-1">
        <?= $message ?>
      </div>
    <?php endif; ?>

    <?php require "views/{$view}.view.php"; ?>

  </main>
</body>

</html>