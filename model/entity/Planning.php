<?php



class Planning extends EntityConfiguration
{

    private $planningId;
    private $name;
    private $description;
    private $publicLink;
    private $isMultipleUsers = 0;
    private $user;
    private $timeSlots = [];

    public function getEntityName()
    {
        return "Planning";
    }

    public function setPlanningId(Int $planningId)
    {
        $this->planningId = $planningId;
        return $this;
    }

    public function getId()
    {
        return $this->planningId;
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

    public function nbTimeSlots()
    {
        return count($this->getTimeSlots());
    }

    public function getNbBooked()
    {
        return null;
    }
}
