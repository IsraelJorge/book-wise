<?php include('./views/components/card-book.php'); ?>

<h2>
  Avalizações
</h2>

<div class="grid grid-cols-4 gap-4">
  <div class="grid col-span-3 gap-4">

    <?php foreach ($reviews as $review): ?>
      <div class="border border-stone-700 rounded p-3">
        <div class="flex gap-1">
          <h3><?= $review->review ?></h3>
          <?php $rating = str_repeat("⭐", $review->rating);  ?>
          <span><?= $rating ?></span>
        </div>
      </div>
    <?php endforeach; ?>

  </div>


  <?php if (auth()): ?>
    <div class="border border-stone-700 rounded">
      <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">
        Me conte o que achou!
      </h1>

      <form method="POST" action="/review-create" class="p-4 flex flex-col gap-4">
        <?php if ($validationsReview = flash()->get('validations_review')): ?>
          <div class="w-full font-semibold text-sm border-2 border-red-800 bg-red-900 text-red-400 rounded-md px-5 py-1">
            <ul>
              <li>Deu ruim!!!</li>
              <?php foreach ($validationsReview as $validation): ?>
                <li><?= $validation ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <div class="flex flex-col gap-1">
          <input type="hidden" name="book_id" value="<?= $book->id ?>" />
          <label class="text-stone-400 font-semibold text-sm" for="review">
            Avaliação
          </label>
          <textarea
            id="review"
            type='text'
            name="review"
            class="border-stone-800 border-2 rounded-md px-2 py-1 bg-stone-900 text-sm outline-none"
            placeholder="Digite sua avaliação..."></textarea>
        </div>

        <div class="flex flex-col gap-1">
          <label class="text-stone-400 font-semibold text-sm" for="rating">
            Nota
          </label>
          <select
            id="rating"
            name="rating"
            class="border-stone-800 border-2 rounded-md px-2 py-1 bg-stone-900 text-sm outline-none"
            placeholder="Digite sua senha...">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>

        <button type="submit" class="font-semibold border-2 border-stone-800 bg-stone-900 hover:bg-stone-800 text-stone-400 rounded-md px-5 py-1">
          Avaliar
        </button>
      </form>
    </div>
  <?php endif; ?>
</div>