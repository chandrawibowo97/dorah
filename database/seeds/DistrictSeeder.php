<?php

use Illuminate\Database\Seeder;
use App\Model\District;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
        	[ 'name' => 'Medan Area', 'city_id' => 1 ],
        	[ 'name' => 'Medan Timur', 'city_id' => 1 ],
        	[ 'name' => 'Medan Maimun', 'city_id' => 1 ],
        	[ 'name' => 'Medan Tembung', 'city_id' => 1 ]
        ];
    
        foreach ($districts as $district) {
        	District::create($district);
        }
    }
}
