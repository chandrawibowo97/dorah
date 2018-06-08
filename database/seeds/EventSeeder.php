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
        	[ 'title' => 'Thamrin Plaza', 'address' => 'Jln. Thamrin no 40', 'event_picture' => 'noimage.png', 'from' => '2018-06-08 13:20:00', 'to' => '2018-06-08 23:20:00', 'place_id' => 'ChIJGTWnlbExMTARvEzuA8-232Y']
        ];
    
        foreach ($events as $event) {
        	Event::create($event);
        }
    }
}
