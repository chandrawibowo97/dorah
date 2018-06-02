<?php

use Illuminate\Database\Seeder;
use App\Model\Pmi_Branch;

class PmiBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = [
        	[ 'name' => 'UTD PMI Kota Medan' , 'address' => 'Jl. Perintis Kemerdekaan No.37' , 'district_id' => 2 , 'postcode' => 20233 , 'lat' => 3.5992310, 'lng' => 98.6835840 ],
        	[ 'name' => 'Palang Merah Indonesia' , 'address' => 'Jl. Palang Merah No.17, A U R' , 'district_id' => 3, 'postcode' => 20151 , 'lat' => 3.5843472, 'lng' => 98.6801561 ]
        ];

        foreach ($branches as $branch) {
        	Pmi_Branch::create($branch);
        }
    }
}
