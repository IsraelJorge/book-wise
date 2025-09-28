<div class="mt-6 grid grid-cols-2 gap-2">
  <div class="border border-stone-700 rounded">

    <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">
      Login
    </h1>

    <form class="p-4 flex flex-col gap-4">
      <div class="flex flex-col gap-1">
        <label class="text-stone-400 font-semibold text-sm" for="email">
          E-mail
        </label>
        <input
          id="email"
          type="email"
          name="email"
          required
          class="border-stone-800 border-2 rounded-md px-2 py-1 bg-stone-900 text-sm outline-none"
          placeholder="Digite seu e-mail..." />

      </div>

      <div class="flex flex-col gap-1">
        <label class="text-stone-400 font-semibold text-sm" for="password">
          Senha
        </label>
        <input
          id="password"
          type="password"
          name="password"
          required
          class="border-stone-800 border-2 rounded-md px-2 py-1 bg-stone-900 text-sm outline-none"
          placeholder="Digite sua senha..." />

      </div>

      <button type="submit" class="w-fit font-semibold border-2 border-stone-800 bg-stone-900 hover:bg-stone-800 text-stone-400 rounded-md px-5 py-1">
        Logar
      </button>

    </form>
  </div>

  <div class="border border-stone-700 rounded">

    <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">
      Registro
    </h1>

    <form method="POST" action="/registration" class="p-4 flex flex-col gap-4">
      <?php if (strlen($message) > 0): ?>
        <div class="w-full font-semibold border-2 border-green-800 bg-green-900 text-green-400 rounded-md px-5 py-1">
          <?= $message ?>
        </div>
      <?php endif; ?>


      <div class="flex flex-col gap-1">
        <label class="text-stone-400 font-semibold text-sm" for="name">
          Nome
        </label>
        <input
          id="name"
          type="text"
          name="name"
          required
          class="border-stone-800 border-2 rounded-md px-2 py-1 bg-stone-900 text-sm outline-none"
          placeholder="Digite seu nome..." />
      </div>

      <div class="flex flex-col gap-1">
        <label class="text-stone-400 font-semibold text-sm" for="email">
          E-mail
        </label>
        <input
          id="email"
          type="email"
          name="email"
          required
          class="border-stone-800 border-2 rounded-md px-2 py-1 bg-stone-900 text-sm outline-none"
          placeholder="Digite seu e-mail..." />
      </div>

      <div class="flex flex-col gap-1">
        <label class="text-stone-400 font-semibold text-sm" for="email_confirm">
          Confirme seu E-mail
        </label>
        <input
          id="email_confirm"
          type="email"
          name="email_confirm"
          required
          class="border-stone-800 border-2 rounded-md px-2 py-1 bg-stone-900 text-sm outline-none"
          placeholder="Confirme seu e-mail..." />
      </div>

      <div class="flex flex-col gap-1">
        <label class="text-stone-400 font-semibold text-sm" for="password">
          Senha
        </label>
        <input
          id="password"
          type="password"
          name="password"
          required
          class="border-stone-800 border-2 rounded-md px-2 py-1 bg-stone-900 text-sm outline-none"
          placeholder="Digite sua senha..." />
      </div>


      <div class="space-x-2">
        <button type="reset" class="w-fit font-semibold border-2 border-stone-800 bg-stone-900 hover:bg-stone-800 text-stone-400 rounded-md px-5 py-1">
          Cancelar
        </button>

        <button type="submit" class="w-fit font-semibold border-2 border-stone-800 bg-stone-900 hover:bg-stone-800 text-stone-400 rounded-md px-5 py-1">
          Registrar
        </button>
      </div>
    </form>
  </div>
</div>