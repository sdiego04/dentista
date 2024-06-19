<?php
namespace Tests\Domain\Entity\LegalPerson;

use app\Domain\Entity\Cnpj\Cnpj;
use app\Domain\Entity\Email\Email;
use PHPUnit\Framework\TestCase;
use app\Domain\Entity\LegalPerson\LegalPerson;
use app\Domain\Entity\Password\Password;

class LegalPersonTest extends TestCase
{
    private LegalPerson $legalPerson;

    protected function setUp(): void
    {
        $params = new \stdClass();
        $params->id = 1;
        $params->name = 'Test';
        $params->last_name = 'User';
        $params->email = 's.diego04@gmail.com';
        $params->password = 'deb5e3dcee05105d425809b458534ab6';
        $params->status = 1;
        $params->parent_id = null;
        $params->cnpj = '44.140.514/0001-18';
        $params->fantasy_name = 'Test Company';

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
        $this->legalPerson->setEmail(new Email('s.diego04@gmail.com'));
        $this->assertEquals('s.diego04@gmail.com', $this->legalPerson->getEmail()->getAddress());
    }

    public function testSetEmail(): void
    {
        $this->legalPerson->setEmail(new Email('s.diego04@gmail.com'));
        $this->assertEquals('s.diego04@gmail.com', $this->legalPerson->getEmail()->getAddress());
    }


    public function testGetPassword(): void
    {
        $this->legalPerson->setPassword(new Password('deb5e3dcee05105d425809b458534ab6'));
        $this->assertEquals('deb5e3dcee05105d425809b458534ab6', $this->legalPerson->getPassword()->getValue());
    }

    public function testSetPassword(): void
    {
        $this->legalPerson->setPassword(new Password('deb5e3dcee05105d425809b458534ab6'));
        $this->assertEquals('deb5e3dcee05105d425809b458534ab6', $this->legalPerson->getPassword()->getValue());
    }

    public function testGetCnpj(): void
    {
        $this->legalPerson->setCnpj(new Cnpj('44.140.514/0001-18'));
        $this->assertEquals('44140514000118', $this->legalPerson->getCnpj()->getDocument());
    }

    public function testSetCnpj(): void
    {
        $this->legalPerson->setCnpj(new Cnpj('44.140.514/0001-18'));
        $this->assertEquals('44140514000118', $this->legalPerson->getCnpj()->getDocument());
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

    public function testGetParentId(): void
    {
        $this->legalPerson->setParentId(1);
        $this->assertEquals(1, $this->legalPerson->getParentId());
    }

    public function testSetParentId(): void
    {
        $this->legalPerson->setParentId(1);
        $this->assertEquals(1, $this->legalPerson->getParentId());
    }
}
?>