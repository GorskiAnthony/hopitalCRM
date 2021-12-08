<?php

namespace Controller;

use Librairies\Renderer;
use Librairies\Http;
use Librairies\Utils;
use Model\Appointment as AppointmentModel;
use Model\Patient;

class Appointment
{
    protected $appointment;

    public function __construct()
    {
        $this->appointment = new AppointmentModel();
    }

    public function index()
    {
        $appointments = $this->appointment->findAll();

        $titre = 'Vos rendez-vous';
        Renderer::render('rendezvous/index', [
            'titre' => $titre,
            'appointments' => $appointments,
        ]);
    }

    public function add()
    {
        if (!empty($_POST)) {
            $this->appointment->setIdPatients(
                Utils::sanitize($_POST['patient'])
            );
            $this->appointment->setDateHour(Utils::sanitize($_POST['date']));
            $this->appointment->add();

            Http::redirect('?controller=appointment&task=index');
        }

        $patients = new Patient();
        $patients = $patients->findAll();

        $titre = 'Prise de Rendez-vous';
        Renderer::render('rendezvous/add', [
            'titre' => $titre,
            'patients' => $patients,
        ]);
    }

    public function edit()
    {
        $id = $_GET['id'];

        if (!empty($_POST)) {
            $this->appointment->setIdPatients(
                Utils::sanitize($_POST['patient'])
            );
            $this->appointment->setDateHour(Utils::sanitize($_POST['date']));
            $this->appointment->edit($id);

            Http::redirect('?controller=appointment&task=index');
        }

        $appointment = $this->appointment->findOneById($id);
        $patients = new Patient();
        $patients = $patients->findAll();

        $titre = 'Édition du rendez vous';
        Renderer::render('rendezvous/edit', [
            'titre' => $titre,
            'appointment' => $appointment,
            'patients' => $patients,
        ]);
    }

    public function rdv()
    {
        $id = $_GET['id'];
        $appointments = $this->appointment->findAllAppointment($id);

        $titre = 'Les rendez vous du patient';
        Renderer::render('rendezvous/rdv', [
            'titre' => $titre,
            'appointments' => $appointments,
        ]);
    }

    public function delete()
    {
        $id = $_GET['id'];

        $this->appointment->delete($id);

        Http::redirect('?controller=appointment&task=index');
    }
}
