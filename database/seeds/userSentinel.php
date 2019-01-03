<?php

use Illuminate\Database\Seeder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class userSentinel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $credentials = [
            'email'         => 'm.syaiful.islam26@gmail.com',
            'password'      => '123123',
            'first_name'    => 'Muhammad',
            'last_name'     => 'Syaiful Islam'
        ];
        $user = Sentinel::registerAndActivate($credentials);
    }
}
