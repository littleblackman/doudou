<?php


/**
 * Class used to configure all entities
 * with common methods as hydrate and
 * common fields
 *
 */
abstract class EntityConfiguration
{

    public function __construct($datas = null)
    {
      if($datas) $this->hydrate($datas);
    }

    abstract public function getEntityName();

    public function hydrate($datas)
    {
      foreach ($datas as $key => $value)
      {
          $elements = explode('_', $key);
          $new_key = '';
          foreach ($elements as $element)
          {
              $new_key .= ucfirst($element);
          }
          $method = 'set'.$new_key;
          if (method_exists($this, $method))
          {
              $this->$method($value);
          }
      }
    }


    public function save()
    {
        $entityManager = $this->getEntityName().'Manager';
        $manager = new $entityManager();
        $manager->save($this);
    }



}
