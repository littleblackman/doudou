<?php



class Person extends EntityConfiguration
{

    private $personId;
    private $firstname;
    private $lastname;
    private $email;

    public function getEntityName()
    {
        return "Person";
    }

    public function setPersonId(Int $personId)
    {
        $this->personId = $personId;
        return $this;
    }

    public function getId()
    {
        return $this->personId;
    }

    public function setFirstname(String $firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setLastname(String $lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getLastname()
    {
        return $this->$lastname;
    }

    public function setEmail(String $email)
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

}
