<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
             // Insert Admin data
    	DB::table('roles')->insert(
            array(
                'display_name'   => "Administrator",
                'description'    => "super admin",
                'created_at'   	 => date("Y-m-d"),
                'updated_at'     => date("Y-m-d"),
            )
        );

        DB::table('users')->insert(
            array(
                'name'     		 => "Dave Paul Garcia",
                'email'    		 => "admin@gmail.com",
                'role_id'  		 => 1,
                'password' 		 => Hash::make('admin123'),
                'created_at'   	 => date("Y-m-d"),
                'updated_at'     => date("Y-m-d"),
            )
        );
        DB::table('roles')->insert(
        array(
                'display_name'   => "User",
                'description'    => "Can add expenses",
                'created_at'     => date("Y-m-d"),
                'updated_at'     => date("Y-m-d"),
            )
        );

        DB::table('users')->insert(
            array(
                'name'           => "Dave Paul Garcia",
                'email'          => "user@gmail.com",
                'role_id'        => 2,
                'password'       => Hash::make('user123'),
                'created_at'     => date("Y-m-d"),
                'updated_at'     => date("Y-m-d"),
            )
        );
    }
}
