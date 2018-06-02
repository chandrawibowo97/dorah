<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(BloodTypeSeeder::class);
    	$this->call(ProvinceSeeder::class);
    	$this->call(CitiesSeeder::class);
    	$this->call(DistrictSeeder::class);
    	$this->call(PmiBranchSeeder::class);
    	$this->call(BloodStockSeeder::class);
        $this->call(UserSeeder::class);
    }
}
