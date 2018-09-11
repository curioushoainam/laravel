<?php
// php artisan db:seed 			=> implement seeder

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(userSeeder::class);
    }
}

// hnhd code
class userSeeder extends Seeder {
	public function run(){
		DB::table('users')->insert([
            ['name'=>'hnhd', 'email'=>'hnhd@gmail.com', 'password'=>bcrypt('123456')],
            ['name'=>'vhd', 'email'=>'vhd@gmail.com', 'password'=>bcrypt('123456')],
            ['name'=>'html', 'email'=>'html@gmail.com', 'password'=>bcrypt('123456')],
			['name'=>'js', 'email'=>'js@gmail.com', 'password'=>bcrypt('123456')],
			['name'=>'Laravel', 'email'=>str_random(5).'@gmail.com', 'password'=>bcrypt('123456')],
			['name'=>'PHP', 'email'=>str_random(5).'@gmail.com', 'password'=>bcrypt('123456')]
		]);
	}
}
