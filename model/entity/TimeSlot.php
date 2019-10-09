<?php

class TimeSlot extends EntityConfiguration
{

  private $idTimeSlot;
  private $dateAvailable;
  private $timeStart;
  private $timeEnd;
  private $isBooked;
  private $planningId;

  public function getEntityName()
  {
      return "TimeSlot";
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

}
