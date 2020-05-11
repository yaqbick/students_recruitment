<?php

class Student
{
    /**
     * @var string
     */
    private $firstName;
    
    /**
     * @var string
     */
    private $lastName;
    
    // Konstruktor...
    
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    
    public function getLastName(): string
    {
        return $this->lastName;
    }
}
