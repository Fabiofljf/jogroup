<?php

use Illuminate\Database\Seeder;
use App\Model\Dettail;

class DettailSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dettails = config('db.dettails');

        foreach ($dettails as $dettail) {
            $new_dettail = new Dettail();
            $new_dettail->person_id = $dettail['person_id'];
            $new_dettail->school = $dettail['school'];
            $new_dettail->argoment = $dettail['argoment'];
            $new_dettail->title = $dettail['title'];
            $new_dettail->year_from = $dettail['year_from'];
            $new_dettail->year_to = $dettail['year_to'];
            $new_dettail->vote = $dettail['vote'];
            $new_dettail->save();
        };
    }
}
