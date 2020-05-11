<?php

class StudentsList
{
    protected $position;
    protected $student;

    public function __construct(int $position, Student $student)
    {
        $this->position = $position;
        $this->student - $student;
    }
}
