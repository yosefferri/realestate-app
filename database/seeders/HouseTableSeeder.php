<?php

namespace Database\Seeders;


use App\Models\House;
use Illuminate\Database\Seeder;


class HouseTableSeeder extends Seeder
{
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
       // Event::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 20; $i++) {
            House::create([
                'address' => $faker->address(),
                'price_buy' =>$faker->numberBetween($min = 10500, $max = 60000),
                'price_rent' =>$faker->numberBetween($min = 1500, $max = 6000),
                'room'=>$faker->numberBetween(1, 3),
                'kitchen'=>$faker->numberBetween(1, 3),
                'garage'=>$faker->numberBetween(0, 3),
                'bathroom'=>$faker->numberBetween(1, 3),
                'TypeContract'=>$faker->numberBetween(1, 3),
                'country'=>$faker->country(),
                'date' => $faker->date(),
                'time' => $faker->time(),
                'status' => 1
            ]);
        }
    }
}

