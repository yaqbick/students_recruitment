<?php

namespace StudentsRecruitment\departments;

use StudentsRecruitment\ListInterface;
use StudentsRecruitment\Application;
use Exception;

class DepartmentA implements ListInterface
{
    use Department;

    public function __construct(Application ...$applications)
    {
        $this->applications = $applications;
        $this->accepted = 100;
        $this->reserved = 10;

        if (count($this->applications) > $this->accepted + $this->reserved) {
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
        if (count($this->applications) < $this->accepted + $this->reserved) {
            $left = $this->accepted + $this->reserved - count($this->applications);
            throw new Exception('Too few applications. Still'.$left.'is missing');
        } else {
            $this->sortApplications();
            $this->acceptedList = array_slice($this->applications, 0, $this->accepted);
            $this->reserveList = array_slice($this->applications, $this->accepted, $this->reserved);
            $this->refusedList = array_slice($this->applications, $this->accepted + $this->reserved);
        }
    }

    public function sortApplications(): void
    {
        usort($this->applications, function ($a, $b) {
            $interval = $a->getSubmissionDate()->diff($b->getSubmissionDate());

            return $interval->format('%s');
        });
    }

    public function sortLists(): void
    {
        usort($this->acceptedList, function ($a, $b) {
            $interval = $a->getSubmissionDate()->diff($b->getSubmissionDate());

            return $interval->format('%s');
        });

        usort($this->reserveList, function ($a, $b) {
            $interval = $a->getSubmissionDate()->diff($b->getSubmissionDate());

            return $interval->format('%s');
        });

        usort($this->refusedList, function ($a, $b) {
            $interval = $a->getSubmissionDate()->diff($b->getSubmissionDate());

            return $interval->format('%s');
        });
    }
}
