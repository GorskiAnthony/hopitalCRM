<?php

namespace Controller;

use Librairies\Utils;
use Librairies\Renderer;
use Model\Patient as ModelPatient;
use Librairies\Http;

class Patient
{
    protected $patient;

    public function __construct()
    {
        $this->patient = new ModelPatient();
    }

    public function index()
    {
        $appointment = new \Model\Appointment();

        $appointments = $appointment->findAll();

        $titre = "Bienvenue à l'hôpital Saint Gilles";
        Renderer::render('homepage/index', [
            'titre' => $titre,
            'appointments' => $appointments,
        ]);
    }

    public function add()
    {
        if (
            isset($_POST['firstName']) &&
            isset($_POST['lastName']) &&
            isset($_POST['phone']) &&
            isset($_POST['email']) &&
            isset($_POST['birthDate'])
        ) {
            $firstName = Utils::sanitize($_POST['firstName']);
            $lastName = Utils::sanitize($_POST['lastName']);
            $phone = Utils::sanitize($_POST['phone']);
            $email = Utils::sanitize($_POST['email']);
            $birthDate = Utils::sanitize($_POST['birthDate']);

            $this->patient->setFirstName($firstName);
            $this->patient->setLastName($lastName);
            $this->patient->setPhone($phone);
            $this->patient->setEmail($email);
            $this->patient->setBirthDate($birthDate);

            $this->patient->add();

            \Librairies\Http::redirect('?controller=patient&task=show');
        }

        $titre = 'Ajouter un patient';
        Renderer::render('patient/add', ['titre' => $titre]);
    }

    public function show()
    {
        $titre = 'Liste des patients';
        Renderer::render('patient/show', [
            'titre' => $titre,
            'patients' => $this->patient->findAll(),
        ]);
    }

    public function showid()
    {
        $id = $_GET['id'];

        $titre = 'Détail du patient';
        Renderer::render('patient/showid', [
            'titre' => $titre,
            'patient' => $this->patient->findOneById($id),
        ]);
    }

    public function update()
    {
        $id = $_GET['id'];

        if (
            isset($_POST['firstName']) &&
            isset($_POST['lastName']) &&
            isset($_POST['phone']) &&
            isset($_POST['email']) &&
            isset($_POST['birthDate'])
        ) {
            $firstName = Utils::sanitize($_POST['firstName']);
            $lastName = Utils::sanitize($_POST['lastName']);
            $phone = Utils::sanitize($_POST['phone']);
            $email = Utils::sanitize($_POST['email']);
            $birthDate = Utils::sanitize($_POST['birthDate']);

            $this->patient->setFirstName($firstName);
            $this->patient->setLastName($lastName);
            $this->patient->setPhone($phone);
            $this->patient->setEmail($email);
            $this->patient->setBirthDate($birthDate);

            $this->patient->updateOneById($id);
        }

        $titre = 'Modifier un patient';
        Renderer::render('patient/update', [
            'titre' => $titre,
            'patient' => $this->patient->findOneById($id),
        ]);
    }

    public function delete()
    {
        $id = $_GET['id'];

        $this->patient->delete($id);

        Http::redirect('?controller=patient&task=show');
    }
}
