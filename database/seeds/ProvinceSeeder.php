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
            // [ 'name' => 'Aceh' ],
            // [ 'name' => 'Bali' ],
            // [ 'name' => 'Bangka Belitung' ],
            // [ 'name' => 'Banten' ],
            // [ 'name' => 'Bengkulu' ],
            // [ 'name' => 'Daerah Istimewa Yogyakarta' ],
            // [ 'name' => 'DKI Jakarta' ],
            // [ 'name' => 'Gorontalo' ],
            // [ 'name' => 'Jawa Barat' ],
            // [ 'name' => 'Jawa Tengah' ],
            // [ 'name' => 'Jawa Timur' ],
            // [ 'name' => 'Kalimantan Barat' ],
            // [ 'name' => 'Kalimantan Selatan' ],
            // [ 'name' => 'Kalimantan Tengah' ],
            // [ 'name' => 'Kalimantan Timur' ],
            // [ 'name' => 'Kepulauan Riau' ],
            // [ 'name' => 'Lampung' ],
            // [ 'name' => 'Maluku' ],
            // [ 'name' => 'Maluku Utara' ],
            // [ 'name' => 'Nusa Tenggara Barat' ],
            // [ 'name' => 'Nusa Tenggara Timur' ],
            // [ 'name' => 'Papua Barat' ],
            // [ 'name' => 'Papua Tengah' ],
            // [ 'name' => 'Papua Timur' ],
            // [ 'name' => 'Riau' ],
            // [ 'name' => 'Sulawesi Barat' ],
            // [ 'name' => 'Sulawesi Selatan' ],
            // [ 'name' => 'Sulawesi Tengah' ],
            // [ 'name' => 'Sulawesi Tenggara' ],
            // [ 'name' => 'Sulawesi Utara' ],
            // [ 'name' => 'Sumatera Barat' ],
            // [ 'name' => 'Sumatera Selatan' ],
    		[ 'name' => 'Sumatera Utara' ]
        ];

        foreach ($provinces as $province) {
        	Province::create($province);
        }
    }
}
