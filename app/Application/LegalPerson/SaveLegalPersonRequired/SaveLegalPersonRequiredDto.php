<?php

namespace app\Application\LegalPerson\SaveLegalPersonRequired;

class SaveLegalPersonRequiredDto{

  private string $cnpj;
  private string $email;
  private string $fantasy_name;
  private string $name;
  private string $password;
  private int $status;
  private ?int $parentid;

  public function __construct(
    string $cnpj, 
    string $email, 
    string $fantasy_name,
    string $name,
    int $status,
    string $password,
    int $parentid = null)
  {
    $this->setCnpj($cnpj);
    $this->setEmail($email);
    $this->setFantasyName($fantasy_name);
    $this->setName($name);
    $this->setStatus($status);
    $this->setPassword($password);
    $this->setParentid($parentid);
  }


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