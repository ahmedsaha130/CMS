<?php

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\Role;
use  App\Models\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $adminRole = Role::create(['name' => 'admin', 'display_name' => 'Administrator', 'description' => 'System Administrator', 'allowed_route' => 'admin']);
        $editRole = Role::create(['name' => 'editor', 'display_name' => 'Supervisor', 'description' => 'System Supervisor', 'allowed_route' => 'admin']);
        $userRole = Role::create(['name' => 'user', 'display_name' => 'User', 'description' => 'Normal User', 'allowed_route' => null]);


        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin1',
            'email' => 'admin@hotmail.com',
            'mobile' => '05947654541',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123123123'),
            'status' => 1,
        ]);
        $admin->attachRole($adminRole);

        $editor = User::create([
            'name' => 'Editor',
            'username' => 'editor',
            'email' => 'editor@hotmail.com',
            'mobile' => '535362532532',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123123123'),
            'status' => 1,
        ]);
        $editor->attachRole($editRole);

        $user1 = User::create([
            'name' => 'ahmed salha',
            'username' => 'ahmed',
            'email' => 'ahmed@hotmail.com',
            'mobile' => '565635836',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123123123'),
            'status' => 1,
        ]);
        $user1->attachRole($userRole);

        $user2 = User::create([
            'name' => 'mohammed salha',
            'username' => 'mohammed',
            'email' => 'mohammed@hotmail.com',
            'mobile' => '5353583',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123123123'),
            'status' => 1,
        ]);
        $user2->attachRole($userRole);
        $user3 = User::create([
            'name' => 'ali salha',
            'username' => 'ali',
            'email' => 'ali@hotmail.com',
            'mobile' => '8658686',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123123123'),
            'status' => 1,
        ]);
        $user3->attachRole($userRole);


        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'username' => $faker->userName,
                'email' => $faker->email,
                'mobile' => '059' . random_int(10000000, 9999999999),
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('123123123'),
                'status' => 1,
            ]);
            $user->attachRole($userRole);


        }
    }
}
