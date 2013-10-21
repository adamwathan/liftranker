<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('users')->delete();

        $users = array(
			[
				'username' => 'Gillian Mounsey', 
				'password' => Hash::make('password'),
				'gender' => 2, 
				'date_of_birth' => '1979-12-01', 
			],

			[
				'username' => 'Oldster', 
				'password' => Hash::make('password'),
				'gender' => 1, 
				'date_of_birth' => '1958-01-01', 
			],

			[
				'username' => 'Clint Merrill', 
				'password' => Hash::make('password'),
				'gender' => 1, 
				'date_of_birth' => '1953-01-01', 
			],

			[
				'username' => 'thefinalsql', 
				'password' => Hash::make('password'),
				'gender' => 1, 
				'date_of_birth' => '1966-01-01', 
			],

			[
				'username' => 'KyleMask', 
				'password' => Hash::make('password'),
				'gender' => 1, 
				'date_of_birth' => '1983-01-01', 
			],

			[
				'username' => 'DRice311', 
				'password' => Hash::make('password'),
				'gender' => 1, 
				'date_of_birth' => '1978-10-02', 
			],

			[
				'username' => 'Jordan Feigenbaum', 
				'password' => Hash::make('password'),
				'gender' => 1, 
				'date_of_birth' => '1985-06-17', 
			],

			[
				'username' => 'Callador', 
				'password' => Hash::make('password'),
				'gender' => 1, 
				'date_of_birth' => '1979-01-01', 
			],

			[
				'username' => 'Hamburgerfan', 
				'password' => Hash::make('password'),
				'gender' => 1, 
				'date_of_birth' => '1992-01-01', 
			],

			[
				'username' => 'AdamW', 
				'password' => Hash::make('password'),
				'gender' => 1, 
				'date_of_birth' => '1987-03-15', 
			],
        );

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }

}