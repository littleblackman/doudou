<?php



class Planning extends EntityConfiguration
{

    private $idPlanning;
    private $name;
    private $description;
    private $publicLink;
    private $isMultipleUsers = 0;
    private $user;
    private $timeSlots = [];
    private $nbTimeSlots;
    private $totalBooked = 0;

    public function getEntityName()
    {
        return "Planning";
    }

    public function getTableName()
    {
        return "planning";
    }

    public function getPrimaryKey()
    {
        return "id_planning";
    }

    public function setIdPlanning(Int $idPlanning)
    {
        $this->idPlanning = $idPlanning;
        return $this;
    }

    public function getId()
    {
        return $this->idPlanning;
    }

    public function setName(String $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDescription(String $description)
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setPublicLink(String $publicLink)
    {
        $this->publicLink = $publicLink;
        return $this;
    }

    public function getPublicLink()
    {
        return $this->publicLink;
    }

    public function setIsMultipleUsers(Int $int)
    {
        $this->isMultipleUsers = $int;
        return $this;
    }

    public function getIsMultipleUsers()
    {
        return $this->isMultipleUsers;
    }


    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function addTimeSlot(TimeSlot $timeSlot)
    {
        $this->timeSlots[] = $timeSlot;
        return $this;
    }

    public function getTimeSlots()
    {
        return $this->timeSlots;
    }

    public function setNbTimeSlots($nbTimeSlots)
    {
        $this->nbTimeSlots = $nbTimeSlots;
        return $this;
    }

    public function getNbTimeSlots()
    {
        return $this->nbTimeSlots;
    }

    public function setTotalBooked($totalBooked)
    {
        $this->totalBooked = $totalBooked;
        return $this;
    }

    public function getTotalBooked()
    {
        return $this->totalBooked;
    }


    public function getNbBooked()
    {
        return null;
    }
}
