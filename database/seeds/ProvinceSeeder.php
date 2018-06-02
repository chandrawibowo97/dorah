<?php

use Illuminate\Database\Seeder;
use App\Model\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
    		[ 'name' => 'Sumatera Utara' ]
        ];

        foreach ($provinces as $province) {
        	Province::create($province);
        }
    }
}
