<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Services\Statistics\CountryStatisticsService;



class CountryStatisticsApiController extends Controller
{
    protected $countryStatisticsService;

    public function __construct(CountryStatisticsService $countryStatisticsService)
    {
        $this->countryStatisticsService = $countryStatisticsService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->countryStatisticsService->getAllCountryStatistics();    
    }
}
