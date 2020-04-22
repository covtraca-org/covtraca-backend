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
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'CovTraca',                
                'email' => 'covtraca@gmail.com',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => '$2y$10$rkkmcrKN.GMK.E.8BUBUVeRwyO7fC2i4vjFsvXdz.4npOZR/gUx6y',                
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        ]);

        $adminUsers = User::whereIn('id', [1])->get();

        foreach ($adminUsers as $adminUser) {
            $adminUser->assignRole('Administrator');
        }
    }
}
