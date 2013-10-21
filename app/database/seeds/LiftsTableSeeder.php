<?php

class LiftsTableSeeder extends Seeder {

	public function run()
	{
    	// Uncomment the below to wipe the table clean before populating
		DB::table('lifts')->delete();

		$lifts = array(
			[ 'name' => 'Squat' ],
			[ 'name' => 'Bench Press' ],
			[ 'name' => 'Deadlift' ],
			[ 'name' => 'Press' ],
		);

        // Uncomment the below to run the seeder
		DB::table('lifts')->insert($lifts);
	}

}