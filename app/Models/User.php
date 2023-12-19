<?php


namespace app\Models;

use app\Models\Email;
use app\Models\Profile;
use stdClass;

class User {

    private int $user_id;
    private Profile $profile;
    private string $name;
    private string $lastname;
    private ?string $fantasy_name;
    private Email $email;
    private ?Cnpj $cnpj;
    private ?Cpf $cpf;
    private ?int $parent_id;
    private string $cro;
    private string $gender;
    private string $birth_date;
    private bool $status;

    public function __construct(stdClass $user = null) {
        if(!is_null($user)){
            $this->setProfile(new Profile($user->profile_id));
            $this->setName($user->name);
            $this->setLastName($user->lastname);
            $this->setFantasyName($user->fantasy_name);
            $this->setEmail(new Email($user->email));
            $this->setCnpj(new Cnpj($user->cnpj));
            $this->setCpf(new Cpf($user->cpf));
            $this->setParentId($user->parent_id);
            $this->setCro($user->cro);
            $this->setGender($user->gender);
            $this->setBirthDate($user->birth_date);
            $this->setStatus($user->status);
        }
    }

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
     * Get the value of lastname
     */
    public function getLastName(): string
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     */
    public function setLastName(string $lastname): self
    {
        $this->lastname = $lastname;

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
     * Get the value of status
     */
    public function getStatus(): bool
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
     * Get the value of profile
     */
    public function getProfile(): Profile
    {
        return $this->profile;
    }

    /**
     * Set the value of profile
     */
    public function setProfile(Profile $profile): self
    {
        $this->profile = $profile;

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
        $this->email = $email;

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
        $this->cnpj = $cnpj;

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
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of birth_date
     */
    public function getBirthDate(): string
    {
        return $this->birth_date;
    }

    /**
     * Set the value of birth_date
     */
    public function setBirthDate(string $birth_date): self
    {
        $this->birth_date = $birth_date;

        return $this;
    }
}
?>