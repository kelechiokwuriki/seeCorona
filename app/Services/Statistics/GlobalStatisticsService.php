<?php

namespace App\Services\Statistics;

use App\Repositories\Statistics\GlobalStatisticsRepository;

class GlobalStatisticsService 
{
	protected $globalStatisticsRepository;

	public function __construct(GlobalStatisticsRepository $globalStatisticsRepository) 
	{
		$this->globalStatisticsRepository = $globalStatisticsRepository;
	}

	public function getAllGlobalStatistics()
	{
		return $this->globalStatisticsRepository->all();
	}

}