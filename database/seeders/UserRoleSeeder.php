<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        $this->userLevel();
        $this->addUser();
    }



    private function addUser()
    {
        try {
            $user = new \App\Models\User();
            $user->name = "Shuaib";
            $user->email = "yyshu18@gmail.com";
            $user->password = bcrypt('pass123');
            $user->save();
            $user->assignRole('SuperAdmin');

            $user = new \App\Models\User();
            $user->name = "Kawan Shuaib";
            $user->email = "kawanshuaib@gmail.com";
            $user->password = bcrypt('pass123');
            $user->save();
            $user->assignRole('Admin');

            $user = new \App\Models\User();
            $user->name = "Aaliyyah";
            $user->email = "aaliyyah@gmail.com";
            $user->password = bcrypt('pass123');
            $user->save();
            $user->assignRole('User');

            $user = new \App\Models\User();
            $user->name = "Kawan Aaliyah";
            $user->email = "kawanaaliyah@gmail.com";
            $user->password = bcrypt('pass123');
            $user->save();
            $user->assignRole('User');

           
        } catch (\Exception $e) {
            dd($e);
        }
    }

    private function userLevel()
    {
        try {
            Role::create(['name' => 'SuperAdmin']);
            Role::create(['name' => 'Admin']);
            Role::create(['name' => 'User']);
        } catch (\Exception $e) {
        }
    }
}