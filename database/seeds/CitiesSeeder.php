<?php

use Illuminate\Database\Seeder;
use App\Model\City;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
        	[ 'name' => 'Medan' , 'province_id' => 1 ]
        ];

        foreach ($cities as $city) {
        	City::create($city);
        }
    }
}
