<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cron extends Model
{
    protected $primaryKey = 'command';

    protected $fillable = ['command', 'next_run', 'last_run'];

    public static function shouldRun($command, $days)
    {
        $cron = Cron::find($command);
        $now = Carbon::now();

        //A command should be run if command is found in database and the next run is less than the current time.
        if(empty($cron) || date('Y-m-d H:i', strtotime($cron->next_run)) > date('Y-m-d H:i', strtotime($now))) {
            return false;
        }

        $cron->next_run = Carbon::parse($cron->next_run)->addDays($days);
        $cron->last_run = Carbon::now();
        $cron->save();
        
        return true;
    }
}
