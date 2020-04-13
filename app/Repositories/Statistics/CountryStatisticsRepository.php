<?php

namespace App\Repositories\Statistics;

use App\Repositories\BaseRepository;
use App\CountryStatistics;


class CountryStatisticsRepository extends BaseRepository
{
    public function __construct(CountryStatistics $countryStatisticsModel)
    {
        parent::__construct($countryStatisticsModel);
    }
}
