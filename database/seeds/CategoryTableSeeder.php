<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
    		['name' => 'Xã hội', 'parent_id' => 0],
    		['name' => 'Thế giới', 'parent_id' => 1],
    		['name' => 'Sức khoẻ', 'parent_id' => 1],
    		['name' => 'Chính trị', 'parent_id' => 1],
    		['name' => 'Du lịch', 'parent_id' => 2],
    		['name' => 'Thể thao', 'parent_id' => 1],
    		['name' => 'Làm đẹp', 'parent_id' => 3],
    		['name' => 'Hóng biến', 'parent_id' => 1],
    	];
    	foreach ($categories as $value) {
    		DB::table('categories')->insert($value);
    	}
    }
}
