<?php

namespace Database\Seeders;


use App\Models\House;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HouseUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
        DB::table('house_user')->insert(
            [
                'user_id' => User::select('id')->orderByRaw("RAND()")->first()->id,
                'house_id' => House::select('id')->orderByRaw("RAND()")->first()->id
            ]
        );
    }
    }
}
