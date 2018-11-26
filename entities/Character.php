<?php

class Character {

    //Attributes
    protected $id,
              $name,
              $damage;

    public function __construct(array $array) {
        $this->hydrate($array);
    }

    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $id = (int) $id;
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of damage
     */ 
    public function getDamage()
    {
                return $this->damage;
    }

    /**
     * Set the value of damage
     *
     * @return  self
     */ 
    public function setDamage($damage)
    {
                $this->damage = $damage;

                return $this;
    }

}