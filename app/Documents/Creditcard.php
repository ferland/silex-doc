<?php

namespace Documents;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document(collection="users") */
class Creditcard
{
    /** @ODM\String */
    private $issuerbank;

    /** @ODM\String */
    private $annualfee;

    /** @ODM\String */
    private $apr;

    /** @ODM\String */
    private $cardtype;

    public function getIssuerbank()
    {
        return $this->issuerbank;
    }

    public function setIssuerbank($issuerbank)
    {
        $this->issuerbank = $issuerbank;
    }

    public function getAnnualfee()
    {
        return $this->annualfee;
    }

    public function setAnnualfee($annualfee)
    {
        $this->annualfee = $annualfee;
    }

    public function getApr()
    {
        return $this->apr;
    }

    public function setApr($apr)
    {
        $this->apr = $apr;
    }  

    public function getCardtype()
    {
        return $this->cardtype;
    }

    public function setCardtype($cardtype)
    {
        $this->cardtype = $cardtype;
    }  

}
