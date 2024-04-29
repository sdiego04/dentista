<?php

namespace app\Domain\Entity\LegalPerson;

use stdClass;

class LegalPerson {

  private string $cnpj;
  private string $email;
  private string $name;
  private string $fantasy_name;
  private string $password;
  private int $status;
  private ?int $parentid = null;

  public function __construct(stdClass $params)
  {
    $this->setCnpj($params->cnpj);
    $this->setEmail($params->email);
    $this->setFantasyName($params->fantasy_name);
    $this->setName($params->name);
    $this->setPassword($params->password);
    $this->setStatus($params->status);
    $this->setParentid($params->parentid);
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
   * Get the value of email
   */
  public function getEmail(): string
  {
    return $this->email;
  }

  /**
   * Set the value of email
   */
  public function setEmail(string $email): self
  {
    $this->email = $email;

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

  /**
   * Get the value of password
   */
  public function getPassword(): string
  {
    return $this->password;
  }

  /**
   * Set the value of password
   */
  public function setPassword(string $password): self
  {
    $this->password = $password;

    return $this;
  }

  /**
   * Get the value of status
   */
  public function getStatus(): int
  {
    return $this->status;
  }

  /**
   * Set the value of status
   */
  public function setStatus(int $status): self
  {
    $this->status = $status;

    return $this;
  }


  /**
   * Get the value of name
   */
  public function getName(): string
  {
    return $this->name;
  }

  /**
   * Set the value of name
   */
  public function setName(string $name): self
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of parentid
   */
  public function getParentid(): ?int
  {
    return $this->parentid;
  }

  /**
   * Set the value of parentid
   */
  public function setParentid(?int $parentid): self
  {
    $this->parentid = $parentid;

    return $this;
  }
}


?>