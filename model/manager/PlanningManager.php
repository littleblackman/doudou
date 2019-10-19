<?php

class PlanningManager extends BddManager
{

    public function __construct()
    {
        $this->session = new Session();
        parent::__construct();
    }

    public function findAll($user_id = null)
    {
        if(!$user_id) {
          $user = $this->session->getUser();
          $user_id = $this->session->getUser()->getId();
        }

        // all plannings & time slots
        $query = "SELECT
                  p.*, count(t.id_time_slot) as nb_time_slots
                  FROM planning p
                  LEFT JOIN time_slot as t ON t.planning_id = p.id_planning
                  WHERE p.user_id = :id
                  GROUP BY p.id_planning ";
        $stmt = $this->prepare($query);
        $stmt -> bindValue(':id', $user_id);
        $stmt -> execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // nb time booked
        $query = "SELECT
                  p.id_planning, count(t.id_time_slot) as nb_time_slot_booked
                  FROM planning p
                  LEFT JOIN time_slot as t ON t.planning_id = p.id_planning
                  WHERE p.user_id = :id
                  AND t.is_booked = 1";

        $stmt = $this->prepare($query);
        $stmt -> bindValue(':id', $user_id);
        $stmt -> execute();
        $datas2 = $stmt->fetchAll(PDO::FETCH_ASSOC);


        // list of booked
        foreach($datas2 as $d) {
            $bookeds[$d['id_planning']] = $d['nb_time_slot_booked'];
        }

        $plannings = null;
        foreach($datas as $data) {
          $planning = new Planning($data);

          if(key_exists($planning->getId(), $bookeds)) {
            $planning->setTotalBooked($bookeds[$planning->getId()]);
          }
          $planning->setUser($user);
          $plannings[] = $planning;
        }

        return $plannings;
    }

    public function find($id)
    {
        $query = "SELECT * FROM planning p
                  LEFT JOIN user u ON u.user_id = p.user_id
                  LEFT JOIN person pe ON pe.person_id = u.person_id
                  WHERE p.id_planning = :id";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if(!$data = $stmt->fetch(PDO::FETCH_ASSOC)) return null;

        $planning = $this->createFromArray($data);
        return $planning;

    }

    public function findBySlug($slug) {
        $query = "SELECT * FROM planning p
                  LEFT JOIN user u ON u.user_id = p.user_id
                  LEFT JOIN person pe ON pe.person_id = u.person_id
                  WHERE p.public_link = :slug";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':slug', $slug);
        $stmt->execute();
        if(!$data = $stmt->fetch(PDO::FETCH_ASSOC)) return false;

        $planning = $this->createFromArray($data);

        return $planning;
    }

    public function createFromArray($data) {

        $person = new Person($data);
        $user = new User($data);
        $user->setPerson($person);
        $planning = new Planning($data);
        $planning->setUser($user);

        // add time slot
        $query = "SELECT * FROM time_slot WHERE planning_id = :id ORDER BY date_available, time_start";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':id', $data['id_planning']);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // get time slot and person
        $query = "SELECT t.id_time_slot, p.* FROM time_slot t
                  LEFT JOIN booking b ON b.time_slot_id = t.id_time_slot
                  LEFT JOIN person p ON p.person_id = b.person_id
                  WHERE t.planning_id = :id
                  AND t.is_booked = 1;";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':id', $data['id_planning']);
        $stmt->execute();

        $personBooked = [];
        if($data2 = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            foreach($data2 as $d) {
                $person = new Person($d);
                $personBooked[$d['id_time_slot']][] = $person;
            }
        }

        if($datas) {
            foreach($datas as $data) {
                $timeSlot = new TimeSlot($data);

                if(key_exists($timeSlot->getId(), $personBooked)) {
                  foreach($personBooked[$timeSlot->getId()] as $p) {
                      $timeSlot->addPerson($p);
                  }
                }

                $planning->addTimeSlot($timeSlot);
            }
        }
        return $planning;
    }

    public function save($object)
    {


        if(!$object->getId()) {
          $query = "INSERT INTO planning SET
                    name = :name,
                    description = :description,
                    public_link = :public_link,
                    is_multiple_users = :is_multiple_users,
                    user_id = :user_id";
        } else {
          $query = "UPDATE planning SET
                        name = :name,
                        description = :description,
                        public_link = :public_link,
                        is_multiple_users = :is_multiple_users,
                        user_id = :user_id
                        WHERE id_planning = :id
                      ";
        }
        $stmt = $this->prepare($query);
        if($object->getId()) $stmt->bindValue(':id', $object->getId());
        $stmt->bindValue(':name', $object->getName());
        $stmt->bindValue(':description', $object->getDescription());
        $stmt->bindValue(':public_link', $object->getPublicLink());
        $stmt->bindValue(':is_multiple_users', $object->getIsMultipleUsers());
        $stmt->bindValue(':user_id', $object->getUser()->getId());
        $stmt->execute();

        (!$object->getId()) ? $lastId =  $this->connexion()->lastInsertId() : $lastId = $object->getId();

        return $lastId;

    }
}
