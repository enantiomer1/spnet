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
            'username'          => 'Admin',
            'email'             => 'admin@admin.com',
            'password'          => bcrypt('1234'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed'         => true,
            'program'           => 'AA',
            'sobriety_date'     => '2000-4-25',
            'zipcode'           => '70818',
            'bio'               => 'Big Book oriented, love the steps, email me.',
            
        ]);

        User::create([
            'username'          => 'Backend',
            'email'             => 'executive@executive.com',
            'password'          => bcrypt('1234'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed'         => true,
            'program'           => 'NA',
            'sobriety_date'     => '2005-6-11',
            'zipcode'           => '70816',
            
        ]);

        User::create([
            'username'          => 'Default',
            'email'             => 'user@user.com',
            'password'          => bcrypt('1234'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed'         => true,
            'program'           => 'Al-Anon',
            'sobriety_date'     => '1995-12-8',
            'zipcode'           => '70814',
            
        ]);

        User::create([
            'username'          => 'John',
            'email'             => 'john@mail.com',
            'password'          => bcrypt('1234'),
            'confirmation_code' => md5(uniqid(mt_rand(), true)),
            'confirmed'         => true,      
        ]);

        $this->enableForeignKeys();
    }
}
