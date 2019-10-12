<?php



class UserManager extends BddManager
{

    public function find($id)
    {

        $query = "SELECT * FROM user u
                  LEFT JOIN person p ON p.person_id = u.person_id
                  WHERE u.user_id = :id ";
        $stmt = $this->prepare($query);
        $stmt -> bindValue(':id', $id);
        $stmt -> execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        $person = new Person($data);
        $user   = new User($data);

        $user->setPerson($person);

        return $user;
    }

    public function findByLogin($login)
    {
          $query = "SELECT * FROM user u
                    LEFT JOIN person p ON p.person_id = u.person_id
                    WHERE u.login = :login";
          $stmt = $this->prepare($query);
          $stmt -> bindValue(':login', $login);
          $stmt -> execute();
          $data = $stmt->fetch(PDO::FETCH_ASSOC);

          $person = new Person($data);
          $user   = new User($data);

          $user->setPerson($person);

          return $user;
    }


    public function save($object)
    {

    }
}
