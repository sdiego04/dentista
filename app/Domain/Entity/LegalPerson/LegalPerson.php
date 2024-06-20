<?php

namespace app\Domain\Entity\LegalPerson;

use app\Domain\Entity\Cnpj\Cnpj;
use app\Domain\Entity\Person\Person;
use stdClass;

class LegalPerson extends Person{

  private Cnpj $cnpj;
  private string $fantasy_name;
  private int $typePersonCode = LEGAL_PERSON;

  /**
   * @property int id
   * @property int status
   * @property int parent_id
   */
  public function __construct(stdClass $params)
  {
    parent::__construct(
      $params->id,
      $params->status,
      $params->parent_id
    );
    
    $this->setParams($params);
  } 

   /**
   * @property int id
   * @property int status
   * @property int parent_id
   */
  private function setParams(stdClass $params)
  {
    $this->setCnpj(new Cnpj($params->cnpj));
    $this->setFantasyName($params->fantasy_name);
    $this->setTypePersonCode(LEGAL_PERSON);
  }

  /** 
   * @param stdClass $params - all properties in the this class
   */
  public static function requireFields(stdClass $params):self
  {
    return new LegalPerson($params);
  }

  //TODO
  public function addPhone(){}


  /**
   * Get the value of fantasy_name
   */
  public function getFantasyName(): string
  {
    return $this->fantasy_name;
  }

  /**
   * Set the value of fantasy_name
   */
  public function setFantasyName(string $fantasy_name): self
  {
    $this->fantasy_name = $fantasy_name;

    return $this;
  }


  /**
   * Get the value of cnpj
   */ 
  public function getCnpj():Cnpj
  {
    return $this->cnpj;
  }

  /**
   * Set the value of cnpj
   *
   * @return  self
   */ 
  public function setCnpj(Cnpj $cnpj)
  {
    $this->cnpj = $cnpj;

    return $this;
  }

  /**
   * Get the value of typePersonCode
   */ 
  public function getTypePersonCode()
  {
    return $this->typePersonCode;
  }

  /**
   * Set the value of typePersonCode
   *
   * @return  self
   */ 
  public function setTypePersonCode($typePersonCode)
  {
    $this->typePersonCode = $typePersonCode;

    return $this;
  }
}


?>