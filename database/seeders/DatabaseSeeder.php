<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $hash=\Hash::make('12345678');
        DB::table('users')->insert([
            ['name' => "admin",'email'=>'admin@gmail.com','role'=>'admin','password'=>''.$hash.''],
          
            ]);
        // \App\Models\User::factory(10)->create();
    }
}
