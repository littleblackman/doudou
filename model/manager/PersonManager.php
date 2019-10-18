<?php



class PersonManager extends BddManager
{
    public function save($object)
    {

        if(!$object->getId()) {
          $query = "INSERT INTO person SET
                    firstname = :firstname,
                    lastname = :lastname,
                    email = :email
                    ";
        } else {
          $query = "UPDATE person SET
                    firstname = :firstname,
                    lastname = :lastname,
                    email = :email
                    WHERE
                    person_id = :id ";
        }
        $stmt = $this->prepare($query);
        $stmt->bindValue(':firstname', $object->getFirstname());
        $stmt->bindValue(':lastname', $object->getLastname());
        $stmt->bindValue(':email', $object->getEmail());
        if($object->getId()) $stmt->bindValue(':person_id', $object->getId());
        $stmt->execute();

        $lastId =  $this->connexion()->lastInsertId();
        $object->setPersonId($lastId);

        return $object;

    }

    public function createPerson($firstname, $lastname, $email) {
      $person = new Person();
      $person->setFirstname($firstname);
      $person->setLastname($lastname);
      $person->setEmail($email);
      $person = $person->save();

      return $person;

    }

    public function find($id) {
      $query = "SELECT * FROM person WHERE person_id = :id";
      $stmt = $this->prepare($query);
      $stmt->bindValue(':id', $id);
      $stmt->execute();

      $data = $stmt->fetch(PDO::FETCH_ASSOC);

      $person = new Person($data);

      return $person;
    }
}
