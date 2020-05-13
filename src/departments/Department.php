<?php

namespace StudentsRecruitment\departments;

use StudentsRecruitment\Application;

trait Department
{
    protected $accepted;
    protected $reserved;
    protected $applications;
    protected $acceptedList;
    protected $reserveList;
    protected $refusedList;

    public function getAcceptedList(): array
    {
        return $this->acceptedList;
    }

    public function getReserveList(): array
    {
        return $this->reserveList;
    }

    public function getRefusedList(): array
    {
        return $this->refusedList;
    }

    public function setAcceptedLimit(int $accepted): void
    {
        $this->accepted = $accepted;
    }

    public function setReserveLimit(int $reserved): void
    {
        $this->reserved = $reserved;
    }

    public function addApplication(Application $application)
    {
        $this->applications[] = $application;
    }
}
