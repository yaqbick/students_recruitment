<?php

declare(strict_types=1);

namespace StudentsRecruitment;

interface ISorter
{
    public function sort(Application...$applications): array;
}
