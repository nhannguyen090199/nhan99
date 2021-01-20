<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr=['Giải trí','Đời sống','Tài chính - Kinh doanh','Giới trẻ', 'Công nghệ'] ;
        foreach($arr as $items){
            DB::table('categories')->insert([
                'cate_name'=> $items,
                'status'=>0
            ]);
        }

    }
}
