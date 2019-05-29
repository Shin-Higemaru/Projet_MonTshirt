<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new \App\User();
        $user->name ="Tony Mitchelli";
        $user->email = "tonymitch@gmail.com";
//        $user->name ="Ozan YILDIZ";
//        $user->email = "shijinboshi@hotmail.fr";
        $user->password = \Illuminate\Support\Facades\Hash::make('123456789');
        $user->save();
        $user->roles()->attach(1);
    }
}
