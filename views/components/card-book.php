<div class="border-stone-800 border-2 bg-stone-900 p-2 rounded">
  <div class="flex">
    <div class="w-1/3">
      imagem
    </div>

    <div class="space-y-1">
      <a href="/book?id=<?= $book->id ?>" class="font-semibold hover:underline"><?= $book->title ?></a>
      <div class="text-xs italic"><?= $book->author ?></div>
      <div class="text-xs italic">
        <?php for ($i = 0; $i < $book->stars; $i++): ?>
          ⭐
        <?php endfor; ?>
        avaliação
      </div>
    </div>
  </div>

  <div class="text-sm mt-1">
    <?= $book->description ?>
  </div>
</div>