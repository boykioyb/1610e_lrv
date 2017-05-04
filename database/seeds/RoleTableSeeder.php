<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = [
    		['id' => 900, 'name' => 'admin'],
    		['id' => 500, 'name' => 'moderator'],
    		['id' => 300, 'name' => 'editor'],
    		['id' => 100, 'name' => 'member'],
    	];
    	foreach ($roles as $value) {
    		DB::table('roles')->insert($value);
    	}
    }
}
