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

    <?php require "views/{$view}.view.php"; ?>

  </main>
</body>

</html>