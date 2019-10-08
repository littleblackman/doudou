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
                  LEFT JOIN time_slot ts ON ts.planning_id = p.planning_id
                  WHERE p.planning_id = :id
                  ORDER BY ts.date_available, ts.time_start";
        $stmt = $this->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if(!$datas = $stmt->fetchAll(PDO::FETCH_ASSOC)) return null;

        foreach($datas as $key => $data)
        {
            if($key == 0) {
              $person = new Person($data);
              $user = new User($data);
              $user->setPerson($person);
              $planning = new Planning($data);
              $planning->setUser($user);
            }
            $timeSlot = new TimeSlot($data);
            $planning->addTimeSlot($timeSlot);
        }

        return $planning;

    }
}
