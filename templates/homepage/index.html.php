<section class="text-gray-600 body-font">
  <div class="px-5 py-24 mx-auto">
    <div class="flex flex-wrap -m-4">
      <?php foreach (array_slice($appointments, 0, 3) as $appointment) {
          $date = new \DateTime($appointment['dateHour']);

          $patient = new \Model\Patient();
          $patient = $patient->findOneById($appointment['idPatients']);
          echo '<div class="p-4 md:w-1/3">
            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
              <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1153&q=80" alt="blog">
              <div class="p-6">
             
              <h1 class="title-font text-lg font-medium text-gray-900 mb-3 flex">  
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>' .
              $patient['lastname'] .
              ' ' .
              $patient['firstname'] .
              '</h1>
                <p class="leading-relaxed mb-3">Le rendez-vous est prévu pour le ' .
              $date->format('d/m/Y') .
              ' à ' .
              $date->format('H\hi') .
              '. <br />N\'hésitez à rappeler le rendez-vous au patient.</p>
              </div>
            </div>
          </div>';
      } ?>
    </div>
  </div>
</section>