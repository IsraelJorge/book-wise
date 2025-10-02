<form class="w-full space-x-2">

  <input
    type="text"
    name="search"
    class="border-stone-800 border-2 rounded-md px-2 py-1 bg-stone-900 text-sm outline-none"
    placeholder="Pesquisar..." />
  <button type="submit">
    🔍
  </button>

</form>

<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

  <?php foreach ($books as $book): ?>
    <?php include('../views/components/card-book.php'); ?>
  <?php endforeach; ?>

</section>