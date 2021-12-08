<a href="?controller=appointment&task=add" >
<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 bg-green-400 text-white rounded-full absolute hover:bg-green-600 right-36 top-36" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
</a>

<?php if (count($appointments) === 0) {
    echo "<h1 class='text-xl font-bold py-10'>Vous n'avez pas de rendez vous de prévu. Merci de prendre un rendez vous pour avoir votre planning.</h1>";
} else {
     ?>
   <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Patient
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Numéro de téléphone
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date de rendez vous
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appointments as $appointment) {
                            $patient = new \Model\Patient();
                            $date = new \DateTime($appointment['dateHour']);

                            $patient = $patient->findOneById(
                                $appointment['idPatients']
                            );
                            echo '<tr class="bg-white">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <a href="?controller=appointment&task=rdv&id=' .
                                $appointment['idPatients'] .
                                '">
                        ' .
                                $patient['lastname'] .
                                ' ' .
                                $patient['firstname'] .
                                '
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            ' .
                                $patient['mail'] .
                                '
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            ' .
                                $patient['phone'] .
                                '
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            ' .
                                $date->format('d/m/Y H\hi') .
                                '
                        </td>
                        <td class="px-6 divide-x divide-gray-200 py-4 whitespace-nowrap text-right text-sm font-medium ">
                            <a href="?controller=appointment&task=edit&id=' .
                                $appointment['id'] .
                                '" class="text-blue-600 hover:text-blue-900 px-2">Edit</a>
                            <a href="?controller=appointment&task=delete&id=' .
                                $appointment['id'] .
                                '" class="text-red-600 hover:text-red-900  px-2">Delete</a>
                        </td>
                        </tr>';
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
