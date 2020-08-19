<?php
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $users =  [
            [
                'name' => 'Waqas',
                'email' => '03001234567',
                'password' => bcrypt('abc'),
                'address' => 'i dont know',
                'loyalty_points' => 0,
                'is_admin' => 1,
            ],
            [
                'name' => 'Ali',
                'email' => '03011234567',
                'password' => bcrypt('abc'),
                'address' => 'i dont know',
                'loyalty_points' => 5,
                'is_admin' => 0,
            ]
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
