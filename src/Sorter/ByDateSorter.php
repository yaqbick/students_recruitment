<?php

declare(strict_types=1);

namespace StudentsRecruitment\Sorter;

use StudentsRecruitment\Application;
use StudentsRecruitment\ISorter;

final class ByDateSorter implements ISorter
{
    public function sort(Application ...$applications): array
    {
        //powinien zwrocic tablice posortowanych wedlug daty [app1, app2]
    }
}
