<?php

declare(strict_types=1);

namespace StudentsRecruitment;

interface ISplitter
{
    public function split(Application... $applications): array;
}
