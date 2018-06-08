<?php

use Illuminate\Database\Seeder;
use App\Model\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
        	[ 'title' => 'Thamrin Plaza', 'address' => 'Jln. Thamrin no 40', 'event_picture' => 'no-image.png', 'from' => '2018-06-08 13:20:00', 'to' => '2018-06-08 23:20:00', 'place_id' => 'ChIJGTWnlbExMTARvEzuA8-232Y'],
            [ 'title' => 'Mikroskil', 'address' => 'Jln. Thamrin no 80', 'event_picture' => 'no-image.png', 'from' => '2018-06-08 13:20:00', 'to' => '2018-06-08 23:20:00', 'place_id' => 'ChIJQ2lmq7ExMTARPMDm3j_nGWk'],
            [ 'title' => 'Sun Plaza', 'address' => 'Jln. Matahari no 40', 'event_picture' => 'no-image.png', 'from' => '2018-06-08 13:20:00', 'to' => '2018-06-08 23:20:00', 'place_id' => 'ChIJtasQbs0xMTARghqdVA5QpvQ'],
            [ 'title' => 'Aryaduta Medan', 'address' => 'Jln. Bumi no 40', 'event_picture' => 'no-image.png', 'from' => '2018-06-08 13:20:00', 'to' => '2018-06-08 23:20:00', 'place_id' => 'ChIJUxhIg88xMTARmEKmhEbKezo'],
            [ 'title' => 'Grand Aston Medan', 'address' => 'Jln. Thamrin no 40', 'event_picture' => 'no-image.png', 'from' => '2018-06-08 13:20:00', 'to' => '2018-06-08 23:20:00', 'place_id' => 'ChIJU0idPL8xMTAR5m2rAGgKTgs']
        ];
    
        foreach ($events as $event) {
        	Event::create($event);
        }
    }
}
