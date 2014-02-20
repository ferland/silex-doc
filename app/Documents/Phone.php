<?php

namespace Documents;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document(collection="users") */
class Phone
{
    /** @ODM\String */
    private $home;

    /** @ODM\String */
    private $mobile;

    public function getMobile()
    {
        return $this->mobile;
    }

    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    public function getHome()
    {
        return $this->home;
    }

    public function setHome($mobile)
    {
        $this->home = $home;
    }

}
