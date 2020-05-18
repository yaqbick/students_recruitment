<?php

declare(strict_types=1);

namespace StudentsRecruitment;

final class Department
{
    /** @var ISorter */
    private $acceptedSorter;

    /** @var ISorter */
    private $refusedSorter;

    /** @var ISplitter */
    private $splitter;

    public function __construct(ISorter $acceptedSorter, ISorter $refusedSorter, ISplitter $splitter)
    {
        $this->acceptedSorter = $acceptedSorter;
        $this->refusedSorter = $refusedSorter;
        $this->splitter = $splitter;
    }

    public function generateAcceptedList(Application...$applications): array
    {
        return $this->splitter->split(
            $this->acceptedSorter->sort($applications)['accepted']
        );
    }

    public function generateRefusedList(Application...$applications): array
    {
        $refusedLists = $this->splitter->split(
            $this->acceptedSorter->sort($applications))['refused'];

        return $this->refusedSorter->sort($refusedLists);
    }
}
