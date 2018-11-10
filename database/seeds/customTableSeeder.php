<?php

use Illuminate\Database\Seeder;

class customTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
          [
                'custom_name' =>'百度',
                'custom_description' =>'百度一下',
                'custom_website' => 'http://www.baidu.com',
                'custom_order' => 1,
          ],
          [
                'custom_name' =>'谷歌',
                'custom_description' =>'谷歌',
                'custom_website' => 'http://www.google.com',
                'custom_order' => 2,
          ],
          [
                'custom_name' =>'必应',
                'custom_description' =>'必应',
                'custom_website' => 'http://www.bing.com',
                'custom_order' => 3,
          ],
        ];
        DB::table('custom')->insert($data);

    }
}
