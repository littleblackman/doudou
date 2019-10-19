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
        if(!$data = $stmt->fetch(PDO::FETCH_ASSOC)) return null;

        $person = new Person($data);
        $user   = new User($data);

        $user->setPerson($person);

        return $user;
    }

    public function findByLoginAndEmail($login)
    {
          $query = "SELECT * FROM user u
                    LEFT JOIN person p ON p.person_id = u.person_id
                    WHERE
                    (u.login = :login or p.email = :login)
                    and is_active = 1
                    ";
          $stmt = $this->prepare($query);
          $stmt -> bindValue(':login', $login);
          $stmt -> execute();
          if(!$data = $stmt->fetch(PDO::FETCH_ASSOC)) return null;

          $person = new Person($data);
          $user   = new User($data);

          $user->setPerson($person);

          return $user;
    }

    public function loginIsExist($login) {
            $query = "SELECT * FROM user u
                      WHERE u.login = :login
                      ";
            $stmt = $this->prepare($query);
            $stmt -> bindValue(':login', $login);
            $stmt -> execute();
            if(!$data = $stmt->fetch(PDO::FETCH_ASSOC)) return 0;
            return 1;
    }


    public function save($user)
    {
        // save person
        $person = $user->getPerson()->save();

        // save user
        if(!$user->getId()) {
          $query = "INSERT INTO user SET
                    login = :login,
                    password = :password,
                    role = 'MANAGER',
                    person_id = :person_id,
                    is_active = :is_active
                    ";
        } else {
          $query = "UPDATE user SET
                    login = :login,
                    password = :password,
                    role = 'MANAGER',
                    person_id = :person_id,
                    is_active = :is_active
                    WHERE
                    user_id = :id ";
        }
        $stmt = $this->prepare($query);
        $stmt->bindValue(':login', $user->getLogin());
        $stmt->bindValue(':password', $user->getPassword());
        $stmt->bindValue(':person_id', $user->getPerson()->getId());
        $stmt->bindValue(':is_active', $user->getIsActive());

        if($user->getId()) {
            $stmt->bindValue(':user_id', $user->getId());
        }
        $stmt->execute();

        $lastId =  $this->connexion()->lastInsertId();
        $user->setUserId($lastId);

        return $user;


    }
}
