<section class="col-span-1 flex text-center bg-white rounded-lg shadow divide-x divide-gray-200">
  <div class="w-2/5 flex flex-col p-8">
    <span class="inline-block h-20 w-20 rounded-full flex-shrink-0 mx-auto overflow-hidden bg-gray-100">
      <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
      </svg>
    </span>
    <form method="POST">
      <h3 class="mt-6 text-gray-900 text-sm font-medium"><?= $patient[
          'firstname'
      ] ?> <?= $patient['lastname'] ?></h3>
      <dl class="mt-1 flex-grow flex flex-col justify-between">
        <dt class="sr-only">Title</dt>
      </dl>
    </div>
    <div class="flex-1 ">
      <div class="py-4">
        <label class="font-bold">Nom :</label> <input class="border-2 border-gray-200 p-3 rounded-sm" id="lastName" name="lastName" type="text" value="<?= $patient[
            'lastname'
        ] ?>">
        <label class="font-bold">Prénom :</label> <input class="border-2 border-gray-200 p-3 rounded-sm" id="firstName" name="firstName" type="text" value="<?= $patient[
            'firstname'
        ] ?>">
      </div>
      <div class="flex flex-col w-3/4 mx-auto py-4 mb-4">
        <label class="font-bold">Email :</label> <input class="border-2 border-gray-200 p-3 rounded-sm" id="email" name="email" type="email" value="<?= $patient[
            'mail'
        ] ?>">
        <label class="font-bold">Téléphone :</label> <input class="border-2 border-gray-200 p-3 rounded-sm" id="phone" name="phone" type="phone" value="<?= $patient[
            'phone'
        ] ?>">
        <label class="font-bold">Date de naissance :</label> <input class="border-2 border-gray-200 p-3 rounded-sm" id="birthDate" name="birthDate" type="date" value="<?= $patient[
            'birthdate'
        ] ?>">
      </div>
      <button class="bg-gray-400 hover:bg-gray-600 px-24 text-white font-bold py-4 mb-10 rounded-lg text-center" type="submit">Enregistrer</button>
    </form>
  </div>
</section>