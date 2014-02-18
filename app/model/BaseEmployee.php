<?php
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\MappedSuperclass */
abstract class BaseEmployee
{
    /** @ODM\Id */
    private $id;

    /** @ODM\Increment */
    private $changes = 0;

    /** @ODM\Collection */
    private $notes = array();

    /** @ODM\String */
    private $name;

    /** @ODM\Float */
    private $salary;

    /** @ODM\Date */
    private $started;

    /** @ODM\Date */
    private $left;

    /** @ODM\EmbedOne(targetDocument="Address") */
    private $address;

    // ...
}

/** @ODM\Document */
class Employee extends BaseEmployee
{
    /** @ODM\ReferenceOne(targetDocument="Documents\Manager") */
    private $manager;

    // ...
}

/** @ODM\Document */
class Manager extends BaseEmployee
{
    /** @ODM\ReferenceMany(targetDocument="Documents\Project") */
    private $projects = array();

    // ...
}

/** @ODM\EmbeddedDocument */
class Address
{
    /** @ODM\String */
    private $address;

    /** @ODM\String */
    private $city;

    /** @ODM\String */
    private $state;

    /** @ODM\String */
    private $zipcode;

    // ...
}

/** @ODM\Document */
class Project
{
    /** @ODM\Id */
    private $id;

    /** @ODM\String */
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    // ...
}