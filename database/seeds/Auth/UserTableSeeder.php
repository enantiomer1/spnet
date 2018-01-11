<?php

use App\Models\Auth\User;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class UserTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        User::create([
            'username'        => 'Admin',
            'email'             => 'admin@admin.com',
            'password'          => bcrypt('1234'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed'         => true,
            'zipcode'           => '70818',
            'sobriety_date'     => '2000-4-25',

        ]);

        User::create([
            'username'        => 'Backend',
            'email'             => 'executive@executive.com',
            'password'          => bcrypt('1234'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed'         => true,
            'zipcode'           => '70816',
            'sobriety_date'     => '2005-6-11',
        ]);

        User::create([
            'username'        => 'Default',
            'email'             => 'user@user.com',
            'password'          => bcrypt('1234'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed'         => true,
            'zipcode'           => '70814',
            'sobriety_date'     => '1995-12-8',
        ]);

        User::create([
            'username'        => 'John',
            'email'             => 'john@mail.com',
            'password'          => bcrypt('1234'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed'         => true,      
        ]);

        $this->enableForeignKeys();
    }
}
