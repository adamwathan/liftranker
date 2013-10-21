<?php

class LiftVariationsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('lift_variations')->delete();

        $liftVariations = array(
        	[ 'short_name' => 'w', 'name' => 'Wraps', 'lift_id' => 1 ],
        	[ 'short_name' => 's', 'name' => 'Sleeves', 'lift_id' => 1 ],
        	[ 'short_name' => '', 'name' => 'No Wraps/Sleeves', 'lift_id' => 1 ],

        	[ 'short_name' => 'p', 'name' => 'Paused', 'lift_id' => 2 ],
        	[ 'short_name' => 't', 'name' => 'Touch and Go', 'lift_id' => 2 ],

            [ 'short_name' => 'c', 'name' => 'Conventional', 'lift_id' => 3 ],
            [ 'short_name' => 's', 'name' => 'Sumo', 'lift_id' => 3 ],

        	[ 'short_name' => '', 'name' => 'Strict', 'lift_id' => 4 ],
        );

        // Uncomment the below to run the seeder
        DB::table('lift_variations')->insert($liftVariations);
    }

}