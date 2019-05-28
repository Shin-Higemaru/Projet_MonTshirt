<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = new \App\Role();
        $role->nom ="admin";
        $role->description ="Le Big Boss du e-commerce";
        $role->save();

        $role2 = new \App\Role();
        $role2->nom ="acheteur";
        $role2->description ="Le client en or";
        $role2->save();

    }
}
