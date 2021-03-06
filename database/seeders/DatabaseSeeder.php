<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\User;
use \App\Models\Note;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Raul Chauvin',
            'email' => 'raul@buhoo.ec',
            'password' => bcrypt('12345678')
        ]);
        Note::factory(30)->create();
    }
}
