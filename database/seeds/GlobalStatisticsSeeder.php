<?php

use Illuminate\Database\Seeder;

use App\GlobalStatistics;


class GlobalStatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(GlobalStatistics::class)->create();
    }
}
