<?php

namespace app\Domain\Entity\LegalPerson;

use app\Domain\Entity\Person\Person;
use stdClass;

class LegalPerson extends Person{

  private string $cnpj;
  private string $fantasy_name;

  public function __construct(stdClass $params)
  {
    parent::__construct(
      $params->id,
      $params->name,
      $params->last_name,
      $params->email,
      $params->password,
      $params->status,
      $params->parent_id
    );
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
   * Get the value of cnpj
   */
  public function getCnpj(): string
  {
    return $this->cnpj;
  }

  /**
   * Set the value of cnpj
   */
  public function setCnpj(string $cnpj): self
  {
    $this->cnpj = $cnpj;

    return $this;
  }


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

}


?>