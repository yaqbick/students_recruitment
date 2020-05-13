<?php

namespace StudentsRecruitment;

interface ListInterface
{
    public function createLists(): void;

    public function sortApplications(): void;

    public function sortLists(): void;
}
