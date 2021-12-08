<section class="col-span-1 flex text-center bg-white rounded-lg shadow divide-x divide-gray-200">
  <div class="flex-1 flex flex-col p-8">
    <span class="inline-block h-20 w-20 rounded-full flex-shrink-0 mx-auto overflow-hidden bg-gray-100">
      <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
      </svg>
    </span>
    <h3 class="mt-6 text-gray-900 text-sm font-medium"><?= $patient[
        'firstname'
    ] ?> <?= $patient['lastname'] ?></h3>
    <dl class="mt-1 flex-grow flex flex-col justify-between">
      <dt class="sr-only">Title</dt>
    </dl>
  </div>
  <div class="flex-1 ">
    <div class="py-4">
      <span class="font-bold">Email :</span> <?= $patient['mail'] ?>
    </div>
    <div class="py-4 mb-4">
      <span class="font-bold">Téléphone :</span> <?= $patient['phone'] ?>
    </div>
    <a class="bg-gray-400 hover:bg-gray-600 px-24 text-white font-bold py-4 rounded-lg text-center" href="?controller=patient&task=update&id=<?= $patient[
        'id'
    ] ?>">Modifier</a>
    <a class="bg-red-400 hover:bg-red-600 px-24 text-white font-bold py-4 rounded-lg text-center" href="?controller=patient&task=delete&id=<?= $patient[
        'id'
    ] ?>">Supprimer</a>
  </div>
</section>


