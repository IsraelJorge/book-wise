<?php

$links = [
  [
    'label' => 'Explorar',
    'href' => '/'
  ],
  [
    'label' => 'Meus Livros',
    'href' => '/my-books'
  ]
]

?>

<header class="bg-stone-900">
  <nav class="mx-auto max-w-screen-lg flex justify-between py-4">
    <div class="font-bold text-xl tracking-wide">
      Book Wise
    </div>

    <ul class="flex gap-4 font-bold">
      <?php foreach ($links as $link): ?>
        <li>
          <a
            class="hover:underline 
            <?php if (isRouteActive($link['href'])) {
              echo 'text-lime-500';
            } ?>" href="<?= $link['href'] ?>">
            <?= $link['label'] ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

    <ul>
      <?php if (auth()): ?>
        <li><a class="hover:underline" href="/logout">Oi, <?= auth()->name ?></a></li>
      <?php else: ?>
        <li><a class="hover:underline" href="/login">Fazer Login</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>