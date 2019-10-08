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

        $query = "SELECT * FROM planning p
                  WHERE p.user_id = :id ";
        $stmt = $this->prepare($query);
        $stmt -> bindValue(':id', $user_id);
        $stmt -> execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $plannings = null;
        foreach($datas as $data) {
          $planning = new Planning($data);
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
                  WHERE p.planning_id = :id";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if(!$data = $stmt->fetch(PDO::FETCH_ASSOC)) return null;

        $person = new Person($data);
        $user = new User($data);
        $user->setPerson($person);
        $planning = new Planning($data);
        $planning->setUser($user);

        // add time slot
        $query = "SELECT * FROM time_slot WHERE planning_id = :id ORDER BY date_available, time_start";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($datas) {
            foreach($datas as $data) {
                $timeSlot = new TimeSlot($data);
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
          $stmt = $this->prepare($query);
          $stmt->bindValue(':name', $object->getName());
          $stmt->bindValue(':description', $object->getDescription());
          $stmt->bindValue(':public_link', $object->getPublicLink());
          $stmt->bindValue(':is_multiple_users', $object->getIsMultipleUsers());
          $stmt->bindValue(':user_id', $object->getUser()->getId());
          $stmt->execute();
          $lastId =  $this->connexion()->lastInsertId();
        }

        return $lastId;

    }

    public function delete($object)
    {
        $query = "DELETE FROM planning where planning_id = :id";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':id', $object->getId());
        $stmt->execute();
    }
}
