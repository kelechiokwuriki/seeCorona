<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cron extends Model
{
    protected $primaryKey = 'command';

    protected $fillable = ['command', 'next_run', 'last_run'];

    public static function shouldRun($command, $minutes)
    {
        $cron = Cron::find($command);
        $now = Carbon::now();

        //if next run date is greater than now date, don't run. Else, HEROKU scheduler missed the timing, so run
        if(empty($cron) || date('Y-m-d H:i', strtotime($cron->next_run)) > date('Y-m-d H:i', strtotime($now))
        {
            return false;
        }

        $cron->next_run = Carbon::parse($cron->next_run)->addMinutes($minutes);


    }
}
