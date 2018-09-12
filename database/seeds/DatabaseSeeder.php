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
        // $this->call(userSeeder::class);
        $this->call(sanphamSeeder::class);
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

class sanphamSeeder extends Seeder {
    public function run(){
        DB::table('sanpham')->insert([
            ['ten'=>'iphone 2018', 'gia'=>'1000', 'soluong'=>20, 'lsp_id'=>2],
            ['ten'=>'iphone X', 'gia'=>'900', 'soluong'=>30, 'lsp_id'=>2],
            ['ten'=>'iphone 10', 'gia'=>'800', 'soluong'=>40, 'lsp_id'=>2],
            ['ten'=>'Samsung Note 9', 'gia'=>'1100', 'soluong'=>60, 'lsp_id'=>2],
            ['ten'=>'Samsung Note 8', 'gia'=>'1000', 'soluong'=>80, 'lsp_id'=>2],
            ['ten'=>'Del Vestro', 'gia'=>'800', 'soluong'=>20, 'lsp_id'=>1],
            ['ten'=>'Asus Rim', 'gia'=>'700', 'soluong'=>10, 'lsp_id'=>1],
            ['ten'=>'HP Thinkpad', 'gia'=>'1200', 'soluong'=>2, 'lsp_id'=>1],
            ['ten'=>'ipad', 'gia'=>'600', 'soluong'=>50, 'lsp_id'=>3],
            ['ten'=>'Tab', 'gia'=>'500', 'soluong'=>70, 'lsp_id'=>3],
            
        ]);
    }
}
