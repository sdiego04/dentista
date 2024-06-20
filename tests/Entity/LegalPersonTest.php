<?php
namespace Tests\Domain\Entity\LegalPerson;

use app\Domain\Entity\Cnpj\Cnpj;
use PHPUnit\Framework\TestCase;
use app\Domain\Entity\LegalPerson\LegalPerson;

class LegalPersonTest extends TestCase
{
    private LegalPerson $legalPerson;

    protected function setUp(): void
    {
        $params = new \stdClass();
        $params->id = 1;
        $params->status = 1;
        $params->parent_id = null;
        $params->cnpj = '44.140.514/0001-18';
        $params->fantasy_name = 'Test Company';
        $params->typepersonid = 2;

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

    public function testGetStatus(): void
    {
        $this->legalPerson->setStatus(1);
        $this->assertEquals(1, $this->legalPerson->getStatus());
    }

    public function testSetStatus(): void
    {
        $this->legalPerson->setStatus(1);
        $this->assertEquals(1, $this->legalPerson->getStatus());
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

    public function testGetTypePersonCode(): void
    {
        $this->legalPerson->setTypePersonCode(1);
        $this->assertEquals(1, $this->legalPerson->getTypePersonCode());
    }

    public function testSetTypePersonCode(): void
    {
        $this->legalPerson->setTypePersonCode(1);
        $this->assertEquals(1, $this->legalPerson->getTypePersonCode());
    }
}
?>