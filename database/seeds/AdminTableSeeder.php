<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder {
	
    public function run()
    {
        DB::table('admins')->delete();
        $users = array(
            array(
                'name'      => 'test',
                'email'      => 'test@test.com',
                'password'   => Hash::make('test'),
				'remember_token' => md5(microtime().Config::get('app.key')),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            )
        );
        DB::table('admins')->insert( $users );
    }
    
}
