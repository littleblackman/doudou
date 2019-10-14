<?php

class TimeSlot extends EntityConfiguration
{

  private $idTimeSlot;
  private $dateAvailable;
  private $timeStart;
  private $timeEnd;
  private $isBooked = 0;
  private $planningId;
  private $persons = [];

  public function getEntityName()
  {
      return "TimeSlot";
  }

  public function getTableName()
  {
      return "time_slot";
  }

  public function getPrimaryKey()
  {
      return "id_time_slot";
  }

  public function toArray()
  {
      $vars = get_object_vars($this);
      $vars['dateAvailable'] = $this->getDateAvailable()->format('Y-m-d');
      $vars['timeStart']     = $this->getTimeStart()->format('H:i');
      $vars['timeEnd']       = $this->getTimeEnd()->format('H:i');
      return $vars;
  }

  public function setIdTimeSlot(Int $idTimeSlot)
  {
      $this->idTimeSlot = $idTimeSlot;
      return $this;
  }

  public function getId()
  {
      return $this->idTimeSlot;
  }

  public function setDateAvailable($dateAvailable)
  {
      if(!is_a($dateAvailable, 'Date Time')) {
        $dateAvailable = new \DateTime($dateAvailable);
      }
      $this->dateAvailable = $dateAvailable;
      return $this;
  }

  public function getDateAvailable()
  {
      return $this->dateAvailable;
  }

  public function setTimeStart($timeStart)
  {
      if(!is_a($timeStart, 'Date Time')) {
        $timeStart = new \DateTime($timeStart);
      }

      $this->timeStart = $timeStart;
      return $this;
  }

  public function getTimeStart()
  {
      return $this->timeStart;
  }


  public function setTimeEnd($timeEnd)
  {

      if(!is_a($timeEnd, 'Date Time')) {
        $timeEnd = new \DateTime($timeEnd);
      }

      $this->timeEnd = $timeEnd;
      return $this;
  }

  public function getTimeEnd()
  {
      return $this->timeEnd;
  }

  public function setIsBooked($val) {
    $this->isBooked = $val;
    return $this;
  }

  public function getIsBooked()
  {
      return $this->isBooked;
  }

  public function setPlanningId($planningId) {
    $this->planningId = $planningId;
    return $this;
  }

  public function getPlanningId()
  {
      return $this->planningId;
  }

  public function addPerson($person) {
      $this->persons[] = $person;
      return $this;
  }

  public function getPersons()
  {
      return $this->persons;
  }

  public function getCreateEventUrl()
  {
    $base_url = "https://www.google.com/calendar/render?action=TEMPLATE";
    $title = "rendez-vous%20doudou";

    $year  = $this->getDateAvailable()->format('Ymd');
    $start = $year.'T'.$this->getTimeStart()->format('Hi').'00Z';
    $end   = $year.'T'.$this->getTimeEnd()->format('Hi').'00Z';
    $dates = $start.'/'.$end;

    $details="Rendez-vous%20doudou";

    $location = "paris,%20france";

    $url = $base_url.'&text='.$title.'&dates='.$dates.'&ctz=Europe/Paris&details='.$details.'&location='.$location;


    return $url;
  }

  public function getIdGroup()
  {
    return $this->getDateAvailable()->format('Ymd').$this->getTimeStart()->format('H');
  }

}
