<?php

$starsFinal = str_repeat("⭐", $book->average_rating);

?>

<div class="border-stone-800 border-2 bg-stone-900 p-2 rounded">
  <div class="flex">
    <div class="w-1/3">
      imagem
    </div>

    <div class="space-y-1">
      <a href="/book?id=<?= $book->id ?>" class="font-semibold hover:underline"><?= $book->title ?></a>
      <div class="text-xs italic"><?= $book->author ?></div>
      <div class="text-xs italic">
        <?= $starsFinal ?>
        (<?= $book->total_rating ?>)
        avaliações
      </div>
    </div>
  </div>

  <div class="text-sm mt-1">
    <?= $book->description ?>
  </div>
</div>