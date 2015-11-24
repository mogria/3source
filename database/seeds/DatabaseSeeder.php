<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $users = array(
            ['name' => 'Mogria', 'email' => 'm0gr14@gmail.com', 'password' => Hash::make('test')],
            ['name' => 'Alkazua', 'email' => 'test-mail@localhost', 'password' => Hash::make('test')],
            ['name' => 'Johnny Rotten', 'email' => 'test-mail2@localhost', 'password' => Hash::make('secret')],
            ['name' => 'Sid Vicious', 'email' => 'test-mail3@localhost', 'password' => Hash::make('secret')]
        );
                        
                // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }

        Model::reguard();
    }
}
