<?php
class Application
{
    /**
     * @var Student
     */
    private $student;
     
    /**
     * @var DateTimeImmutable
     */
    private $submissionDate;
    
    // Konstruktor...
     
    /**
     * @var int
     */
    private $points;
     
    public function getStudent(): Student
    {
        return $this->student;
    }
     
    public function getSubmissionDate(): DateTimeImmutable
    {
        return $this->submissionDate;
    }
     
    public function getPoints(): int
    {
        return $this->points;
    }
}
