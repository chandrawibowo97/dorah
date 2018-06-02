<?php

use Illuminate\Database\Seeder;
use App\Model\Blood_Type;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blood_types = [
        	[ 'label' => 'A+' ],
        	[ 'label' => 'A-' ],
        	[ 'label' => 'B+' ],
        	[ 'label' => 'B-' ],
        	[ 'label' => 'AB+'],
        	[ 'label' => 'AB-'],
        	[ 'label' => 'O+' ],
        	[ 'label' => 'O-' ]
        ];

    	foreach ($blood_types as $blood_type) {
    		Blood_Type::create($blood_type);
    	}
    }
}
