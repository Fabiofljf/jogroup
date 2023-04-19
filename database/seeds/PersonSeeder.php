<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Model\Person;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $new_person = new Person();
            $new_person->name = $faker->name();
            $new_person->surname = $faker->lastName();
            $new_person->gender = $faker->randomElement(['male', 'female']);
            $new_person->email = $faker->email();
            $new_person->date_of_birth = $faker->dateTimeBetween('1990-01-01', '1997-03-18')
            ->format('d/m/Y');
            $new_person->save();
        }
    }
}
