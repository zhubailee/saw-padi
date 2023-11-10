<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory()->create([
            'name'      =>  'administrator',
            'email'     =>  'admin@gmail.com',
            'password'  =>  bcrypt('admin'),
            'address'   =>  'Lhokseumawe',
            'birth'     =>  '2000-05-02',
            'gender'    =>  'Laki-laki'
        ]);
    }
}
