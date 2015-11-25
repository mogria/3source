<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = array(
            ['name' => 'Mogria', 'email' => 'm0gr14@gmail.com', 'password' => Hash::make('test')],
            ['name' => 'Alkazua', 'email' => 'test-mail@localhost', 'password' => Hash::make('test')],
        );
                        
        foreach ($users as $user)
        {
            factory(User::class)->create($user)->save();
        }

        factory(User::class, 5)->create()->each(function($user) {
            $user->save();
        });
    }
}
