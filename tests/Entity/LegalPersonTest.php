<?php
namespace Tests\Domain\Entity\LegalPerson;

use app\Domain\Entity\Email\Email;
use PHPUnit\Framework\TestCase;
use app\Domain\Entity\LegalPerson\LegalPerson;

class LegalPersonTest extends TestCase
{
    private LegalPerson $legalPerson;

    protected function setUp(): void
    {
        $params = new \stdClass();
        $params->id = 1;
        $params->name = 'Test';
        $params->last_name = 'User';
        $params->email = 'test@example.com';
        $params->password = 'password';
        $params->status = 1;
        $params->parent_id = null;
        $this->legalPerson = new LegalPerson($params);
    }

    
    public function testSetId(): void
    {
        $this->legalPerson->setId(3232);
        $this->assertEquals(3232, $this->legalPerson->getId());
    }

    public function testGetId(): void
    {
        $this->legalPerson->setId(3232);
        $this->assertEquals(3232, $this->legalPerson->getId());
    }

    public function testGetFirstName(): void
    {
        $this->legalPerson->setFirstName('John');
        $this->assertEquals('John', $this->legalPerson->getFirstName());
    }

    public function testSetFirstName(): void
    {
        $this->legalPerson->setFirstName('John');
        $this->assertEquals('John', $this->legalPerson->getFirstName());
    }

    public function testGetLastName(): void
    {
        $this->legalPerson->setLastName('Silva');
        $this->assertEquals('Silva', $this->legalPerson->getLastName());
    }

    public function testSetLastName(): void
    {
        $this->legalPerson->setLastName('Silva');
        $this->assertEquals('Silva', $this->legalPerson->getLastName());
    }

    public function testGetEmail(): void
    {
        $this->legalPerson->setEmail(new Email('test@example.com'));
        $this->assertEquals('test@example.com', $this->legalPerson->getEmail()->getAddress());
    }

    public function testSetEmail(): void
    {
        $this->legalPerson->setEmail(new Email('test@example.com'));
        $this->assertEquals('test@example.com', $this->legalPerson->getEmail()->getAddress());
    }

    public function testGetCnpj(): void
    {
        $this->legalPerson->setCnpj('12345678901234');
        $this->assertEquals('12345678901234', $this->legalPerson->getCnpj());
    }

    public function testSetCnpj(): void
    {
        $this->legalPerson->setCnpj('12345678901234');
        $this->assertEquals('12345678901234', $this->legalPerson->getCnpj());
    }

    public function testGetFantasyName(): void
    {
        $this->legalPerson->setFantasyName('Test Company');
        $this->assertEquals('Test Company', $this->legalPerson->getFantasyName());
    }

    public function testSetFantasyName(): void
    {
        $this->legalPerson->setFantasyName('Test Company');
        $this->assertEquals('Test Company', $this->legalPerson->getFantasyName());
    }
}
?>