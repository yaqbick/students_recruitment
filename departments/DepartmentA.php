<?php
define("ACCEPTED", 100);
define("RESERVED", 10);
class DepartmentA implements ListInterface
{
    protected $applications;
    protected $acceptedList;
    protected $reserveList;
    protected $refusedList;
    
    public function __construct(Application...$applications)
    {
        $this->applications = $applications;
        $this->sort();
    }

    public function addApplication(Application $application)
    {
        $this->applications[] = $application;
        $this->sort();
    }
    public function createLists(Application...$applications)
    {
        $this->acceptedList=array_slice($this->applications, 0, ACCEPTED);
        $this->acceptedList=array_slice($this->applications, ACCEPTED, ACCEPTED+RESERVED);
        $this->acceptedList=array_slice($this->applications, ACCEPTED+RESERVED);
    }

    public function getAcceptedList():array
    {
        return $this->acceptedList;
    }

    public function getReserveList():array
    {
        return $this->reserveList;
    }

    public function getRefusedList():array
    {
        return $this->refusedList;
    }

    public function sort():void
    {
        function date_sort($a, $b)
        {
            return strtotime($a->getSubmissionDate()) - strtotime($b->getSubmissionDate());
        }
        usort($this->applications, "date_sort");
    }
}
