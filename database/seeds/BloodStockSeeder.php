<?php

use Illuminate\Database\Seeder;
use App\Model\Blood_Stock;

class BloodStockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stocks = [
        	[ 'pmi_branch_id' => 1, 'blood_type_id' => 1, 'stock' => 50 ],
        	[ 'pmi_branch_id' => 1, 'blood_type_id' => 2, 'stock' => 50 ],
        	[ 'pmi_branch_id' => 1, 'blood_type_id' => 3, 'stock' => 50 ],
        	[ 'pmi_branch_id' => 1, 'blood_type_id' => 4, 'stock' => 50 ],
        	[ 'pmi_branch_id' => 1, 'blood_type_id' => 5, 'stock' => 50 ],
        	[ 'pmi_branch_id' => 1, 'blood_type_id' => 6, 'stock' => 50 ],
        	[ 'pmi_branch_id' => 1, 'blood_type_id' => 7, 'stock' => 50 ],
        	[ 'pmi_branch_id' => 1, 'blood_type_id' => 8, 'stock' => 50 ],
        	[ 'pmi_branch_id' => 2, 'blood_type_id' => 1, 'stock' => 20 ],
        	[ 'pmi_branch_id' => 2, 'blood_type_id' => 2, 'stock' => 15 ],
        	[ 'pmi_branch_id' => 2, 'blood_type_id' => 3, 'stock' => 38 ],
        	[ 'pmi_branch_id' => 2, 'blood_type_id' => 4, 'stock' => 33 ],
        	[ 'pmi_branch_id' => 2, 'blood_type_id' => 5, 'stock' => 18 ],
        	[ 'pmi_branch_id' => 2, 'blood_type_id' => 6, 'stock' => 23 ],
        	[ 'pmi_branch_id' => 2, 'blood_type_id' => 7, 'stock' => 9 ],
        	[ 'pmi_branch_id' => 2, 'blood_type_id' => 8, 'stock' => 11 ],
        ];

        foreach ($stocks as $stock) {
        	Blood_Stock::create($stock);
        }
    }
}
