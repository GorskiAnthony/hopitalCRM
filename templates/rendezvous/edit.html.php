<?php

$date = new \DateTime($appointment['dateHour']); ?>

<form method="POST" >
  <div>
    <label for="date" class="block text-sm font-medium text-gray-700">Édition du rendez vous</label>
    <div class="mt-1 relative rounded-md shadow-sm w-2/5 border-2 border-gray-300 p-2">
      <input type="datetime-local" id="date" name="date" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" min="<?= date(
          'Y-m-d\T00:00'
      ) ?>" value="<?= $date->format('Y-m-d\TH:i') ?>" required >
    </div>
  </div>
  <div>
  <label for="patient-select" class="block text-sm font-medium text-gray-700">Patient</label>
    <?php
    $patientRDV = new \Model\Patient();
    $patientRDV = $patientRDV->findOneById($appointment['idPatients']);

    echo '<select name="patient" class="mt-1 block w-2/5 pl-3 pr-10 py-2 text-base border-2 border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" id="patient-select" required>
          <option value="' .
        $appointment['idPatients'] .
        '">' .
        $patientRDV['lastname'] .
        ' ' .
        $patientRDV['firstname'] .
        '</option>';
    foreach ($patients as $patient) {
        echo "<option value='{$patient['id']}'>{$patient['lastname']} {$patient['firstname']}</option>";
    }
    echo '</select>';
    ?>
  </div>

  <button type="submit" class="inline-flex items-center px-6 py-3 mt-5 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
  Enregistrer
  </button>
</form>