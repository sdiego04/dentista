<?php

namespace app\Infrastructure\Owner;

use app\Domain\Entity\Cpf\Cpf;
use app\Domain\Entity\Email\Email;
use app\Domain\Entity\Owner\IOwnerRepository;
use app\Domain\Entity\Owner\Owner;
use app\Services\ConnectionDB;

class OwnerRepository extends ConnectionDB implements IOwnerRepository{
    
        public function save(Owner $owner):void
        {
     
        }

        public function update(Owner $owner):void
        {

        }

        public function inative(int $ownerId):void
        {

        }

        public function active(int $ownerId):void
        {

        }

        public function delete(int $ownerId):void
        {

        }

        public function getOwner(int $ownerId):Owner
        {
            return new Owner(new \stdClass());
        }

        public function getOwnerByEmail(Email $email):Owner
        {
            return new Owner(new \stdClass());
        }

        public function getOwnerByCpf(Cpf $cpf):Owner
        {
            return new Owner(new \stdClass());
        }

        public function all():array
        {
            return array();
        }

        
}