<?php

use Illuminate\Database\Seeder;

use App\CountryStatistics;


class CountryStatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CountryStatistics::class)->create();
    }
}
