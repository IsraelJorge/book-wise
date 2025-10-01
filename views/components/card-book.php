<?php

$sumRating = array_reduce($reviews ?? [], function ($acc, $item) {
  return $acc + $item->rating;
}, 0);

$sumRating = round($sumRating / 5);
$starsFinal = str_repeat("⭐", $sumRating);

?>

<div class="border-stone-800 border-2 bg-stone-900 p-2 rounded">
  <div class="flex">
    <div class="w-1/3">
      imagem
    </div>

    <div class="space-y-1">
      <a href="/book?id=<?= $book->id ?>" class="font-semibold hover:underline"><?= $book->title ?></a>
      <div class="text-xs italic"><?= $book->author ?></div>
      <?php if (isset($reviews)): ?>
        <div class="text-xs italic">
          <?= $starsFinal ?>
          (<?= count($reviews) ?>)
          avaliações
        </div>
      <?php endif; ?>
    </div>
  </div>

  <div class="text-sm mt-1">
    <?= $book->description ?>
  </div>
</div>