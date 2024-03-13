<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*User::factory(6)->create();*/
       // \App\Models\User::factory(6)->create();
       $user = User::factory()->create([
        'name' => 'John Doe',
        'email' => 'john@gmail.com'
       ]);
        Listing::Factory(6)->create([
           'user_id' => $user->id
        ]);

        //Listing::create ([
           // 'title'=>'Laravel Senior Developer',
           // 'tags'=>'laravel, javascript',
           // 'company'=>'Acme Corpe',
           // 'location'=>'Boston, MA',
           // 'email'=>'email@email.com',
           // 'website'=>'https://www.acme.com',
           // 'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
        
        //]);
       // Listing::create ([
            
              //  'title'=>'Full Stack Engineer',
              //  'tags'=>'laravel, backend, api',
              //  'company'=>'Stark Industries',
              //  'location'=>'Newyork, NY',
               // 'email'=>'email2@email.com',
              //  'website'=>'https://www.starkindusries.com',
              //  'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
            

       // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
