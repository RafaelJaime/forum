<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create(['email'=>'raulreyes@gmail.com']);
        factory(\App\User::class, 50)->create();
        factory(\App\Forum::class, 20)->create();
        factory(\App\Post::class, 50)->create();
        factory(\App\Reply::class, 100)->create();
    }
}
