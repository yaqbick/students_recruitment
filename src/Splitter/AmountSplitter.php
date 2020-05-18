<?php

declare(strict_types=1);

namespace StudentsRecruitment\Splitter;

use StudentsRecruitment\Application;
use StudentsRecruitment\ISplitter;

final class AmountSplitter implements ISplitter
{
    /** @var int|null */
    private $accepted;

    /** @var int|null */
    private $reserved;

    /** @var int|null */
    private $refused;

    public function __construct(?int $accepted, ?int $reserved, ?int $refused)
    {
        $this->accepted = $accepted;
        $this->reserved = $reserved;
        $this->refused = $refused;
    }


    public function split(Application... $applications): array
    {
        //to powinno zwrocic
        //['accepted'=> [...],
        //'refused' => [...]]
    }
}
