<h1 class="text-2xl font-semibold">Meus Livros</h1>

<div class="grid grid-cols-4 gap-4">
  <div class="flex flex-col col-span-3 gap-4">
    <?php if (isset($books)): ?>
      <?php foreach ($books as $book): ?>
        <?php include('./views/components/card-book.php'); ?>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>

  <?php if (auth()): ?>
    <div class="border border-stone-700 rounded">
      <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">
        Cadastre um novo livro!
      </h1>

      <form method="POST" action="/book-create" enctype="multipart/form-data" class="p-4 flex flex-col gap-4">
        <?php if ($validations = flash()->get('validations')): ?>
          <div class="w-full font-semibold text-sm border-2 border-red-800 bg-red-900 text-red-400 rounded-md px-5 py-1">
            <ul>
              <li>Deu ruim!!!</li>
              <?php foreach ($validations as $validation): ?>
                <li><?= $validation ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <div class="flex flex-col gap-1">
          <label class="text-stone-400 font-semibold text-sm" for="image">
            Imagem
          </label>
          <input
            id="image"
            type="file"
            name="image"
            accept="image/*"
            placeholder="Selecione uma imagem..."
            class="border-stone-800 border-2 rounded-md px-2 py-1 bg-stone-900 text-sm outline-none" />
        </div>

        <div class="flex flex-col gap-1">
          <label class="text-stone-400 font-semibold text-sm" for="title">
            Titulo
          </label>
          <input
            id="title"
            type="text"
            name="title"
            class="border-stone-800 border-2 rounded-md px-2 py-1 bg-stone-900 text-sm outline-none" />
        </div>

        <div class="flex flex-col gap-1">
          <label class="text-stone-400 font-semibold text-sm" for="author">
            Autor
          </label>
          <input
            id="author"
            type="text"
            name="author"
            class="border-stone-800 border-2 rounded-md px-2 py-1 bg-stone-900 text-sm outline-none" />
        </div>

        <div class="flex flex-col gap-1">
          <label class="text-stone-400 font-semibold text-sm" for="description">
            Descrição
          </label>
          <textarea
            id="description"
            type='text'
            name="description"
            class="border-stone-800 border-2 rounded-md px-2 py-1 bg-stone-900 text-sm outline-none"></textarea>
        </div>

        <button type="submit" class="font-semibold border-2 border-stone-800 bg-stone-900 hover:bg-stone-800 text-stone-400 rounded-md px-5 py-1">
          Cadastrar
        </button>
      </form>
    </div>
  <?php endif; ?>
</div>