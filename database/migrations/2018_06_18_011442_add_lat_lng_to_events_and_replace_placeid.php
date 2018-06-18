<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLatLngToEventsAndReplacePlaceid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            // remove placeid
            $table->dropColumn('place_id');
            
            //add lat & lng
            $table->double('lat');
            $table->double('lng');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('place_id');
            $table->dropColumn('lat');
            $table->dropColumn('lng');
        });
    }
}
