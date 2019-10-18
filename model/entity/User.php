<?php



class User extends EntityConfiguration
{
    private $userId;
    private $login;
    private $password;
    private $person;
    private $role;
    private $isActive;

    public function getEntityName()
    {
        return "User";
    }

    public function getTableName()
    {
        return "user";
    }

    public function getPrimaryKey()
    {
        return "user_id";
    }

    public function setUserId(Int $userId)
    {
        $this->userId = $userId;
        return $this;
    }

    public function getId()
    {
        return $this->userId;
    }

    public function setLogin(String $login)
    {
        $this->login = $login;
        return $this;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setPassword(String $password)
    {
        $this->password = $password;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPerson(Person $person)
    {
        $this->person = $person;
        return $this;
    }

    public function getPerson()
    {
        return $this->person;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setIsActive($is_active)
    {
      $this->isActive = $is_active;
      return $this;
    }

    public function getIsActive()
    {
        return $this->isActive;
    }

    public function getFullname()
    {
        return $this->getPerson()->getFullname();
    }

    public function getFirstname()
    {
        return $this->getPerson()->getFirstname();
    }

    public function getLastname()
    {
        return $this->getPerson()->getLastname();
    }

    public function getEmail()
    {
        return $this->getPerson()->getEmail();
    }


}
