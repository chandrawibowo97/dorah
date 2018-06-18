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
        	[ 'title' => 'Thamrin Plaza', 'address' => 'Jln. Thamrin no 40', 'event_picture' => 'no-image.png', 'from' => '2018-06-08 13:20:00', 'to' => '2018-06-08 23:20:00', 'lat' => '3.586703', 'lng' => '98.692412'],
            [ 'title' => 'Mikroskil', 'address' => 'Jln. Thamrin no 80', 'event_picture' => 'no-image.png', 'from' => '2018-06-08 13:20:00', 'to' => '2018-06-08 23:20:00', 'lat' => ' 3.58797', 'lng' => '98.69063'],
            [ 'title' => 'Sun Plaza', 'address' => 'Jln. Matahari no 40', 'event_picture' => 'no-image.png', 'from' => '2018-06-08 13:20:00', 'to' => '2018-06-08 23:20:00', 'lat' => '3.583062', 'lng' => '98.671763'],
            [ 'title' => 'Aryaduta Medan', 'address' => 'Jln. Bumi no 40', 'event_picture' => 'no-image.png', 'from' => '2018-06-08 13:20:00', 'to' => '2018-06-08 23:20:00', 'lat' => '3.589844', 'lng' => '98.674093'],
            [ 'title' => 'Grand Aston Medan', 'address' => 'Jln. Thamrin no 40', 'event_picture' => 'no-image.png', 'from' => '2018-06-08 13:20:00', 'to' => '2018-06-08 23:20:00', 'lat' => ' 3.590096', 'lng' => '98.676716']
        ];
    
        foreach ($events as $event) {
        	Event::create($event);
        }
    }
}
