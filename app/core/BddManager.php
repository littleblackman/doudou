<?php
/**
 * Class BddManager
 *
 */
abstract class BddManager
{
    private $bdd;

    public function __construct()
    {
      try {
        $this->bdd = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_LOGIN, DB_PWD);
      } catch(PDOException $e) {
        die($e->getMessage());
      }
    }

    abstract public function save($object);

    public function connexion()
    {
        return $this->bdd;
    }

    public function prepare($query)
    {
        return $this->connexion()->prepare($query);
    }

}
