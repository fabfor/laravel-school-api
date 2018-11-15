<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 50; $i++) {
        DB::table('courses')->insert([
          'code' => $faker->numerify('####'),
          'name' => $faker->catchPhrase,
          'credits' => $faker->randomDigit,
        ]);
      }
    }
}
