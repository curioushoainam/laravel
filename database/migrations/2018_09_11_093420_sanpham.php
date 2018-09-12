<?php
//  php artisan make:migration sanpham  => create migratinon sanpham
//  php artisan migrate                 => implement created migration sanphm
//  php artisan migrate::rollback       => go back previous migration
//  php artisan migrate::reset          => remove all migrations out of database
//  php artisan migrate:refresh         => remove all migrations out of database and re-create all migrations that exists on the folder migrations

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('sanpham')) {        
            Schema::create('sanpham', function($table){
                $table->increments('id');            
                $table->string('ten',200)->nullable();
                $table->string('gia',200)->nullable();
                $table->string('soluong',200)->nullable();
                $table->string('lsp_id',200)->nullable();
            });            
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
