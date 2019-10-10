<?php

class TimeSlotManager extends BddManager
{
  public function find($id)
  {
      $query = "SELECT * FROM time_slot WHERE id_time_slot = :id";
      $stmt = $this->prepare($query);
      $stmt->bindValue(':id', $id);
      $stmt->execute();

      $data = $stmt->fetch(PDO::FETCH_ASSOC);

      $timeSlot = new TimeSlot($data);

      return $timeSlot;
  }

  public function joinPerson($timeSlot, $person) {
      $query = "INSERT INTO booking SET
              person_id = :person_id,
              time_slot_id = :time_slot_id";
      $stmt = $this->prepare($query);
      $stmt->bindValue(':person_id', $person->getId());
      $stmt->bindValue(':time_slot_id', $timeSlot->getId());
      $stmt->execute();

      $this->setBooked(1, $timeSlot->getId());

  }

  public function setBooked($is_booked, $id) {
      $query = "UPDATE time_slot SET
              is_booked = :is_booked
              WHERE id_time_slot = :id";
      $stmt = $this->prepare($query);
      $stmt->bindValue(':is_booked', $is_booked);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
  }

  public function save($object)
  {

      if(!$object->getId()) {
        $query = "INSERT INTO time_slot SET
                  date_available = :date_available,
                  time_start = :time_start,
                  time_end = :time_end,
                  planning_id = :planning_id
                  ";
      }
      $stmt = $this->prepare($query);
      $stmt->bindValue(':date_available', $object->getDateAvailable()->format('Y-m-d'));
      $stmt->bindValue(':time_start', $object->getTimeStart()->format('H:i'));
      $stmt->bindValue(':time_end', $object->getTimeEnd()->format('H:i'));
      $stmt->bindValue(':planning_id', $object->getPlanningId());
      $stmt->execute();

      $lastId =  $this->connexion()->lastInsertId();
      $object->setIdTimeSlot($lastId);

      return $object;

  }

}
