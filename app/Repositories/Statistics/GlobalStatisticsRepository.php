<?php

namespace App\Repositories\Statistics;

use App\Repositories\BaseRepository;
use App\GlobalStatistics;


class GlobalStatisticsRepository extends BaseRepository
{
    public function __construct(GlobalStatistics $globalStatisticsModel)
    {
        parent::__construct($globalStatisticsModel);
    }
}
