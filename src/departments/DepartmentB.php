<?php

namespace StudentsRecruitment\departments;

use StudentsRecruitment\ListInterface;
use StudentsRecruitment\Application;
use Exception;

class DepartmentB implements ListInterface
{
    use Department;

    public function __construct(Application ...$applications)
    {
        $this->applications = $applications;
        $this->accepted = 75;
        if (count($this->applications) > $this->accepted) {
            $this->createLists(...$this->applications);
        } else {
            $this->acceptedList = [];
            $this->reserveList = [];
            $this->refusedList = [];
        }
        $this->sortApplications();
    }

    public function createLists(Application ...$applications): void
    {
        if (count($this->applications) < $this->accepted) {
            $left = $this->accepted - count($this->applications);
            throw new Exception('Too few applications. Still'.$left.'is missing');
        } else {
            $this->sortApplications();
            $this->acceptedList = array_slice($this->applications, 0, $this->accepted);
            $this->refusedList = array_slice($this->applications, $this->accepted);
            $this->sortLists();
        }
    }

    public function sortApplications(): void
    {
        usort($this->applications, function ($a, $b) {
            return $b->getPoints() - $a->getPoints();
        });
    }

    public function sortLists(): void
    {
        usort($this->acceptedList, function ($a, $b) {
            return $b->getPoints() - $a->getPoints();
        });

        usort($this->refusedList, function ($a, $b) {
            return strcmp($a->getStudent()->getLastName(), $b->getStudent()->getLastName());
        });
    }
}
