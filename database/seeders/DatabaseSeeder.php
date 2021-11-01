<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user4 = new User();
        $user4->name = 'admin';
        $user4->email= 'admin@gmail.com';
        $user4->password = bcrypt('admin');
        
        $user4->save();
    }
}
