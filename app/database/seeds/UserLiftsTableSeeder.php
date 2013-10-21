<?php

class UserLiftsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('user_lifts')->delete();

        $userLifts = array(
        	// Gillian
        	[ 
        		'user_id' => '1',
        		'lift_variation_id' => '2',
        		'weight_lifted' => '369',
        		'bodyweight' => '159',
        	],

        	[ 
        		'user_id' => '1',
        		'lift_variation_id' => '5',
        		'weight_lifted' => '281',
        		'bodyweight' => '159',
        	],

        	[ 
        		'user_id' => '1',
        		'lift_variation_id' => '6',
        		'weight_lifted' => '458',
        		'bodyweight' => '159',
        	],



        	// Oldster
        	[ 
        		'user_id' => '2',
        		'lift_variation_id' => '2',
        		'weight_lifted' => '450',
        		'bodyweight' => '237',
        	],

        	[ 
        		'user_id' => '2',
        		'lift_variation_id' => '5',
        		'weight_lifted' => '410',
        		'bodyweight' => '237',
        	],

        	[ 
        		'user_id' => '2',
        		'lift_variation_id' => '6',
        		'weight_lifted' => '550',
        		'bodyweight' => '237',
        	],



        	// Clint Merrill
        	[ 
        		'user_id' => '3',
        		'lift_variation_id' => '1',
        		'weight_lifted' => '345',
        		'bodyweight' => '165',
        	],

        	[ 
        		'user_id' => '3',
        		'lift_variation_id' => '4',
        		'weight_lifted' => '243',
        		'bodyweight' => '165',
        	],

        	[ 
        		'user_id' => '3',
        		'lift_variation_id' => '6',
        		'weight_lifted' => '457',
        		'bodyweight' => '165',
        	],


        	// thefinalsql
        	[ 
        		'user_id' => '4',
        		'lift_variation_id' => '2',
        		'weight_lifted' => '661',
        		'bodyweight' => '377',
        	],

        	[ 
        		'user_id' => '4',
        		'lift_variation_id' => '4',
        		'weight_lifted' => '430',
        		'bodyweight' => '377',
        	],

        	[ 
        		'user_id' => '4',
        		'lift_variation_id' => '6',
        		'weight_lifted' => '606',
        		'bodyweight' => '377',
        	],


        	// KyleMask
        	[ 
        		'user_id' => '5',
        		'lift_variation_id' => '2',
        		'weight_lifted' => '515',
        		'bodyweight' => '197',
        	],

        	[ 
        		'user_id' => '5',
        		'lift_variation_id' => '4',
        		'weight_lifted' => '375',
        		'bodyweight' => '197',
        	],

        	[ 
        		'user_id' => '5',
        		'lift_variation_id' => '6',
        		'weight_lifted' => '650',
        		'bodyweight' => '197',
        	],


        	// DRice311
        	[ 
        		'user_id' => '6',
        		'lift_variation_id' => '2',
        		'weight_lifted' => '507',
        		'bodyweight' => '195',
        	],

        	[ 
        		'user_id' => '6',
        		'lift_variation_id' => '4',
        		'weight_lifted' => '400',
        		'bodyweight' => '195',
        	],

        	[ 
        		'user_id' => '6',
        		'lift_variation_id' => '6',
        		'weight_lifted' => '601',
        		'bodyweight' => '195',
        	],



        	// Jordan Feigenbaum
        	[ 
        		'user_id' => '7',
        		'lift_variation_id' => '2',
        		'weight_lifted' => '500',
        		'bodyweight' => '202',
        	],

        	[ 
        		'user_id' => '7',
        		'lift_variation_id' => '4',
        		'weight_lifted' => '375',
        		'bodyweight' => '202',
        	],

        	[ 
        		'user_id' => '7',
        		'lift_variation_id' => '6',
        		'weight_lifted' => '600',
        		'bodyweight' => '202',
        	],


        	// Callador
        	[ 
        		'user_id' => '8',
        		'lift_variation_id' => '1',
        		'weight_lifted' => '605',
        		'bodyweight' => '360',
        	],

        	[ 
        		'user_id' => '8',
        		'lift_variation_id' => '5',
        		'weight_lifted' => '465',
        		'bodyweight' => '360',
        	],

        	[ 
        		'user_id' => '8',
        		'lift_variation_id' => '6',
        		'weight_lifted' => '653',
        		'bodyweight' => '360',
        	],



        	// Hamburgerfan
        	[ 
        		'user_id' => '9',
        		'lift_variation_id' => '1',
        		'weight_lifted' => '633',
        		'bodyweight' => '236',
        	],

        	[ 
        		'user_id' => '9',
        		'lift_variation_id' => '4',
        		'weight_lifted' => '319',
        		'bodyweight' => '236',
        	],

        	[ 
        		'user_id' => '9',
        		'lift_variation_id' => '7',
        		'weight_lifted' => '562',
        		'bodyweight' => '236',
        	],


        	// AdamW
        	[ 
        		'user_id' => '10',
        		'lift_variation_id' => '3',
        		'weight_lifted' => '535',
        		'bodyweight' => '238',
        	],

        	[ 
        		'user_id' => '10',
        		'lift_variation_id' => '4',
        		'weight_lifted' => '380',
        		'bodyweight' => '238',
        	],

        	[ 
        		'user_id' => '10',
        		'lift_variation_id' => '6',
        		'weight_lifted' => '601',
        		'bodyweight' => '238',
        	],
        );

        // Uncomment the below to run the seeder
        DB::table('user_lifts')->insert($userLifts);
    }

}