<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	['name' => 'thienth', 'email' => 'admin@1610.com', 'password' => Hash::make('secret')],
        	['name' => 'dodv', 'email' => 'author@1610.com', 'password' => Hash::make('secret')],
        	['name' => 'vanh', 'email' => 'mod@1610.com', 'password' => Hash::make('secret')],
        ];
        foreach ($users as $value) {
        	DB::table('users')->insert($value);
        }
    }
}
