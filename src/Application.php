<?php

namespace StudentsRecruitment;

use DateTimeImmutable;

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

    public function __construct(Student $student, DateTimeImmutable $submissionDate, int $points)
    {
        $this->student = $student;
        $this->submissionDate = $submissionDate;
        $this->points = $points;
    }

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
