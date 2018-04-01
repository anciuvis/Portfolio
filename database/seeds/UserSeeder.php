<?php

use Illuminate\Database\Seeder;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			// Admin sukurimas userio:
			$admin = new User;
			$admin->name = 'Anya';
			$admin->email = 'nonofthem@gmail.com';
			$admin->password = Hash::make('Labainevykeskodas6');
			$admin->role = 'admin';
			$admin->save();

    }
}
