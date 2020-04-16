<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


use App\Services\Statistics\GlobalStatisticsService;


class GlobalStatisticsApiController extends Controller
{
    protected $globalStatisticsService;

    public function __construct(GlobalStatisticsService $globalStatisticsService)
    {
        $this->globalStatisticsService = $globalStatisticsService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $response = Http::post('https://api.covid19api.com/webhook', [
            "URL" => "http://ead07bb5.ngrok.io/webhook"
        ]);

        Log::debug($response);

        return $response;

        // return $this->globalStatisticsService->getAllGlobalStatistics();
    }
}
