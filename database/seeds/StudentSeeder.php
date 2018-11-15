<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

      for ($i=0; $i < 100; $i++) {
        DB::table('students')->insert([
          'name' => $faker->name,
          'lastname' => $faker->lastname,
          'course_id' => $faker->numberBetween($min = 1, $max = 5),
        ]);
      }
    }
}
