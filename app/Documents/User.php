<?php

namespace Documents;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document(collection="users") */
class User
{
    /** @ODM\Id */
    protected $id;

    /** @ODM\String */
    private $username;

    /** @ODM\String */
    protected $password;

    /** @ODM\EmbedOne(targetDocument="Address") */
    protected $address;

    public function __construct()
    {
        $this->phonenumbers = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = md5($password);
    }

    public function checkPassword($password)
    {
        return $this->password === md5($password);
    }

    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function __toString()
    {
        return $this->username;
    }
}
