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
                    ' .
                            $patient['lastname'] .
                            ' ' .
                            $patient['firstname'] .
                            '
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
                    </tr>';
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
