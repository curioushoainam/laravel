<?php
// cmd for creating a model: php artisan make:model Model_Name
namespace App;

use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{
    // link to the table 'loaisanpham' on the database
    protected $table = 'loaisanpham';
    // disable insert time value into the respective table.
    public $timestamps = false;
}
