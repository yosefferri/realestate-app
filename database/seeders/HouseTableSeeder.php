<?php

namespace Database\Seeders;


use App\Models\House;
use Illuminate\Database\Seeder;


class HouseTableSeeder extends Seeder
{
    public function run()
    {

        $faker = \Faker\Factory::create();

            for ($i = 0; $i < 20; $i++) {
            House::create([
                'address' => $faker->address(),
                'price_buy' =>$faker->numberBetween($min = 10500, $max = 60000),
                'price_rent' =>$faker->numberBetween($min = 1500, $max = 6000),
                'room'=>$faker->numberBetween(1, 3),
                'kitchen'=>$faker->numberBetween(1, 3),
                'garage'=>$faker->numberBetween(0, 3),
                'bathroom'=>$faker->numberBetween(1, 3),
                'type_contract'=>$faker->numberBetween(1, 3),
                'country'=>$faker->country(),
                'date' => $faker->date(),
                'status' => 1
            ]);
        }
    }
}

