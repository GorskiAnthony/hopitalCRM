<?php

namespace Model;

class Patient
{
    protected $lastName;
    protected $firstName;
    protected $birthDate;
    protected $phone;
    protected $email;
    protected $pdo;

    public function __construct()
    {
        $this->pdo = \Librairies\Database::getPDO();
    }

    /** getter / setter */
    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /** getter / setter */
    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /** getter / setter */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /** getter / setter */
    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    /** getter / setter */
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function add()
    {
        $query =
            'INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES (:lastName, :firstName, :birthDate, :phone, :email)';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':lastName', $this->lastName);
        $statement->bindValue(':firstName', $this->firstName);
        $statement->bindValue(':birthDate', $this->birthDate);
        $statement->bindValue(':phone', $this->phone);
        $statement->bindValue(':email', $this->email);
        $statement->execute();
    }

    public function findAll()
    {
        $query = 'SELECT * FROM patients ORDER by `id` DESC';
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $patients = $statement->fetchAll();

        return $patients;
    }

    public function findOneById($id)
    {
        $query = 'SELECT * FROM patients WHERE id = :id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();

        return $statement->fetch();
    }

    public function updateOneById($id)
    {
        $query =
            'UPDATE patients SET lastname = :lastName, firstname = :firstName, birthdate = :birthDate, phone = :phone, mail = :email WHERE id = :id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':lastName', $this->lastName);
        $statement->bindValue(':firstName', $this->firstName);
        $statement->bindValue(':birthDate', $this->birthDate);
        $statement->bindValue(':phone', $this->phone);
        $statement->bindValue(':email', $this->email);
        $statement->bindValue(':id', $id);
        $statement->execute();
    }

    public function delete($id)
    {
        $query = 'DELETE FROM patients WHERE id = :id';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
    }
}
