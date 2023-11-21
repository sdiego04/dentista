<?php


namespace app\Models;

use app\Models\Email;
use app\Models\Profile;
use app\Models\Phone;
use DateTime;


class User {

    private int $user_id;
    private Profile $profile_id;
    private string $name;
    private string $last_name;
    private ?string $fantasy_name;
    private Email $email;
    private ?Cnpj $cnpj;
    private ?Cpf $cpf;
    private ?int $parent_id;
    private string $cro;
    private string $gender;
    private DateTime $birth_date;
    private bool $status;

    public function __construct() {}

    /**
     * Get the value of user_id
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     */
    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

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
     * Get the value of fantasy_name
     */
    public function getFantasyName(): ?string
    {
        return $this->fantasy_name;
    }

    /**
     * Set the value of fantasy_name
     */
    public function setFantasyName(?string $fantasy_name): self
    {
        $this->fantasy_name = $fantasy_name;

        return $this;
    }

    /**
     * Get the value of last_name
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     */
    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of parent_id
     */
    public function getParentId(): ?int
    {
        return $this->parent_id;
    }

    /**
     * Set the value of parent_id
     */
    public function setParentId(?int $parent_id): self
    {
        $this->parent_id = $parent_id;

        return $this;
    }

    /**
     * Get the value of birth_date
     */
    public function getBirthDate(): DateTime
    {
        return $this->birth_date;
    }

    /**
     * Set the value of birth_date
     */
    public function setBirthDate(DateTime $birth_date): self
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of cro
     */
    public function getCro(): string
    {
        return $this->cro;
    }

    /**
     * Set the value of cro
     */
    public function setCro(string $cro): self
    {
        $this->cro = $cro;

        return $this;
    }

    /**
     * Get the value of gender
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     */
    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(Email $email): self
    {
        $this->email = $email->getEmail();

        return $this;
    }

    /**
     * Get the value of cnpj
     */
    public function getCnpj(): ?Cnpj
    {
        return $this->cnpj;
    }

    /**
     * Set the value of cnpj
     */
    public function setCnpj(?Cnpj $cnpj): self
    {
        $this->cnpj = $cnpj->getCnpj();

        return $this;
    }

    /**
     * Get the value of cpf
     */
    public function getCpf(): ?Cpf
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     */
    public function setCpf(?Cpf $cpf): self
    {
        $this->cpf = $cpf->getCpf();

        return $this;
    }

    /**
     * Get the value of profile_id
     */
    public function getProfileId(): Profile
    {
        return $this->profile_id;
    }

    /**
     * Set the value of profile_id
     */
    public function setProfileId(Profile $profile_id): self
    {
        $this->profile_id = $profile_id->getId();

        return $this;
    }
}
?>