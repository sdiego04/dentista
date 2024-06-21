<?php

namespace app\Domain\Entity\Owner;

use app\Domain\Entity\Cpf\Cpf;
use app\Domain\Entity\Email\Email;

interface IOwnerRepository{

    public function save(Owner $owner):void;
    public function update(Owner $owner):void;
    public function inative(int $ownerId):void;
    public function active(int $ownerId):void;
    public function delete(int $ownerId):void;
    public function getOwner(int $ownerId):Owner;
    public function getOwnerByEmail(Email $email):Owner;
    public function getOwnerByCpf(Cpf $cpf):Owner;
    public function all():array;

}