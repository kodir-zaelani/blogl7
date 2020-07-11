<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        // User::create([
        //     'name' => 'Kodir Zaelani',
        //     'slug' => 'kodir-zaelani',
        //     'email' => 'kodir@zaelani.id',
        //     'email_verified_at' => now(),
        //     // 'password' => 'secret12',
        //     'password' => bcrypt('secret12'),
        //     'remember_token' => Str::random(10)
        //     // 'bio' => $faker->text(rand(250, 300))
        // ]);

        // generate 3 users/author

        if (env('APP_ENV') == 'local')
        {
            $faker = \Faker\Factory::create();
            $users = [
                [
                    'name' => "Kodir Zaelani",
                    'slug' => 'kodir-zaelani',
                    'email' => "kodir@zaelani.id",
                    'email_verified_at' => now(),
                    'password' => bcrypt('secret12'),
                    'remember_token' => Str::random(10),
                    'bio' => $faker->text(rand(250, 300))
                ],
                [
                    'name' => "Abdul Fatah",
                    'slug' => 'abdul-fatah',
                    'email' => "abdul.fatah@gmail.com",
                    'email_verified_at' => now(),
                    'password' => bcrypt('secret12'),
                    'remember_token' => Str::random(10),
                    'bio' => $faker->text(rand(250, 300))
                ],
                [
                    'name' => "Naurah Mahabbah",
                    'slug' => 'naurah-mahabbah',
                    'email' => "naurah@gmail.com",
                    'email_verified_at' => now(),
                    'password' => bcrypt('secret12'),
                    'remember_token' => Str::random(10),
                    'bio' => $faker->text(rand(250, 300))
                ],
            ];
        }
        else
        {
            $users = [
                'name' => "Administrator",
                'slug' => 'admin',
                'email' => "admin@admin.com",
                'password' => bcrypt('admin12'),
                'bio' => "I'm an Administrator"
            ];
        }

        DB::table('users')->insert($users);
    }
}
