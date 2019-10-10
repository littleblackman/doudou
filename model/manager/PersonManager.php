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
        }
        $stmt = $this->prepare($query);
        $stmt->bindValue(':firstname', $object->getFirstname());
        $stmt->bindValue(':lastname', $object->getLastname());
        $stmt->bindValue(':email', $object->getEmail());
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
}
