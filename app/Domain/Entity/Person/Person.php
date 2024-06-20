<?php

namespace app\Domain\Entity\Person;

abstract class Person
{
    private ?int $id = null;
    private int $status = STATUS_ACTIVE;
    private ?int $parentId = null;

    /**
     * @property int id
     * @property int status
     * @property int parent_id
     */
    public function __construct(int $id, int $status, int $parentId = null)
    {
        $this->setId($id);
        $this->setStatus($status);
        $this->setParentId($parentId);
    }
 
    /**
     * Get the value of parentId
     */ 
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set the value of parentId
     *
     * @return  self
     */ 
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}