<?php
// lệnh tạo controller từ cmd folder chủ 
// php artisan make:controller MyController

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function Hello($name){
    	echo "Hallo ".$name;
    }

    public function Farewell(){
    	echo "Auf Wiedersehen VHD";
    	redirect()->route('hallo'); // call router name 'hallo'
    }
}
