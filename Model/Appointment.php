<?php

namespace Model;

class Appointment
{
    protected $pdo;
    protected $dateHour;
    protected $idPatients;

    public function __construct()
    {
        $this->pdo = \Librairies\Database::getPDO();
    }

    /** Getter / Setter */

    public function getDateHour()
    {
        return $this->dateHour;
    }

    public function setDateHour($dateHour)
    {
        $this->dateHour = $dateHour;
    }

    public function getIdPatients()
    {
        return $this->idPatients;
    }

    public function setIdPatients($idPatients)
    {
        $this->idPatients = $idPatients;
    }

    public function findAll()
    {
        $sql = 'SELECT * FROM appointments ORDER by `dateHour` DESC';
        $pdoStatement = $this->pdo->query($sql);
        $appointments = $pdoStatement->fetchAll(\PDO::FETCH_ASSOC);

        if (!$appointments) {
            return [];
        }

        return $appointments;
    }

    public function findOneById()
    {
        $id = $_GET['id'];

        $sql = 'SELECT * FROM appointments WHERE id = :id';
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, \PDO::PARAM_INT);
        $pdoStatement->execute();

        $appointment = $pdoStatement->fetch(\PDO::FETCH_ASSOC);

        if (!$appointment) {
            return [];
        }

        return $appointment;
    }

    public function add()
    {
        $sql =
            'INSERT INTO appointments (dateHour, idPatients) VALUES (:dateHour, :idPatients)';
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':dateHour', $this->dateHour);
        $pdoStatement->bindValue(
            ':idPatients',
            $this->idPatients,
            \PDO::PARAM_INT
        );
        $pdoStatement->execute();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM appointments WHERE id = :id';
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, \PDO::PARAM_INT);
        $pdoStatement->execute();
    }

    public function findAllAppointment($id)
    {
        $sql = 'SELECT * FROM appointments WHERE idPatients = :id';
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, \PDO::PARAM_INT);
        $pdoStatement->execute();
        $appointments = $pdoStatement->fetchAll(\PDO::FETCH_ASSOC);

        if (!$appointments) {
            return [];
        }

        return $appointments;
    }

    public function edit($id)
    {
        $sql =
            'UPDATE appointments SET dateHour = :dateHour, idPatients = :idPatients WHERE id = :id';
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindValue(':dateHour', $this->dateHour);
        $pdoStatement->bindValue(
            ':idPatients',
            $this->idPatients,
            \PDO::PARAM_INT
        );
        $pdoStatement->bindValue(':id', $id, \PDO::PARAM_INT);
        $pdoStatement->execute();
    }
}
