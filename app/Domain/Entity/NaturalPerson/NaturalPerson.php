<?php 

namespace app\Domain\Entity\NaturalPerson;

use app\Domain\Entity\Cpf\Cpf;
use app\Domain\Entity\Person\Person;
use stdClass;

class NaturalPerson extends Person{

    private string $name;
    private string $lastname;
    private Cpf $cpf;
    private ?int $typePersonCode = NATURAL_PERSON;
    private string $birthdate;
    private string $gender;

    /**
     * @property string name
     * @property string lastname
     * @property Cpf cpf
     * @property int typepersoncode
     * @property string birthdate
     * @property string gender
     */
    public function __construct(stdClass $param)
    {   
        parent::__construct(
            $param ->id,
            $param ->status,
            $param ->parent_id
        );
        
        $this->setParams($param);
    }

    /**
     * @property string name
     * @property string lastname
     * @property Cpf cpf
     * @property int typepersoncode
     * @property string birthdate
     * @property string gender
     */
    private function setParams(stdClass $params)
    {
        $this->setName($params->name);
        $this->setLastname($params->lastname);
        $this->setCpf(new Cpf($params->cpf));
        $this->setTypePersonCode($params->typepersonid);
        $this->setBirthdate($params->birthdate);
        $this->setGender($params->gender);
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
     * Get the value of lastname
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of cpf
     */
    public function getCpf(): Cpf
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     */
    public function setCpf(Cpf $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of birthdate
     */
    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    /**
     * Set the value of birthdate
     */
    public function setBirthdate(string $birthdate): self
    {
        $this->birthdate = $birthdate;

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