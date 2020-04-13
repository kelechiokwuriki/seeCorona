<?php

namespace App\Services\Statistics;

use App\Repositories\Statistics\CountryStatisticsRepository;


class CountryStatisticsService 
{
    protected $countryStatisticsRepo;
    
    public function __construct(CountryStatisticsRepository $countryStatisticsRepo)
    {
        $this->countryStatisticsRepo = $countryStatisticsRepo;
    }

    public function getAllCountryStatistics()
    {
        return $this->countryStatisticsRepo->all();
    }

}
