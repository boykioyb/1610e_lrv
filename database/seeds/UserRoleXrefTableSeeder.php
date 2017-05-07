<?php

use Illuminate\Database\Seeder;

class UserRoleXrefTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRoleXrefs = [
        	['user_id' => 1, 'role_id' => 900],
        	['user_id' => 2, 'role_id' => 300],
        	['user_id' => 3, 'role_id' => 500],
        ];
        foreach ($userRoleXrefs as $value) {
        	DB::table('user_role_xref')->insert($value);
        }
    }
}
