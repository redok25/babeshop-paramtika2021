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
    	DB::table('Users')->insert([
    		'username' => 'admin',
    		'password' => bcrypt('admin'),
    	]);
    }
}
