<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Status::create([
            'name'=>'Đang Sử Dụng'
        ]);
        Status::create([
            'name'=>'Đang Bảo Trì'
        ]);
        Status::create([
            'name'=>'Đã Hư Hỏng'
        ]);
       
    }
}
