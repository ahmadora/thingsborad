<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['CUSTOMER', 'TENANT'];
        foreach ($roles as $role) {
            \App\Models\Role::create(['name' => $role]);
        }
         \App\Models\Role::where('name','TENANT')->first()->users()->create([
            'name' => 'tenant',
            'email' => 'tenant@thingsboard.org',
            'password' =>bcrypt('tenant'),
            'token'=> Str::random(60)]);
    }
}
