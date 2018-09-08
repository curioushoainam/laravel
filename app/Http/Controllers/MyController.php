<?php
// lệnh tạo controller từ cmd folder chủ 
// php artisan make:controller MyController

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
	public function viewArr($arr){
		// this function displays $arr's content on the browser
		echo '<pre>';
    	print_r ($arr);
    	echo '</pre>';
	}

    public function Hello($name){
    	echo "Hallo ".$name;
    }

    public function Farewell(){
    	echo "Auf Wiedersehen VHD";
    	return redirect()->route('hallo'); // call router name 'hallo' (Route2)
    }

    public function GetURL(Request $req){
    	// Hàm lấy thông tin từ URL tương ứng

    	// Lấy thông tin của route đang gọi hàm này
    	// return $req->path();			// callReqURL

    	// Lấy url đầy đủ
    	// return $req->url(); 			// http://localhost/Laravel/myLaravel/callReqURL

    	// Kiểm tra phương thức truyền
    	// if($req->isMethod('post'))
    	// 	return 'the method is the post';
    	// else
    	// 	return 'the method is not the post';		// print this out
    	// --------------------------------
    	// if($req->isMethod('get'))
    	// 	return 'the method is the get';				// print this out
    	// else
    	// 	return 'the method is not the get';		

    	// Kiểm tra có ký tự 'URL' trong đường dẫn hay không
    	if($req->is('*URL*'))
    		return 'the url has the letter "URL"';				// print this out
    	else
    		return 'the url does not have the letter "URL"';	
    }

    public function postDemo(Request $req){
    	// the function gets data from the page formDemo which has $_POST['txtname']  

    	$this->viewArr($req->all());		// display $req's contents on the browser.

    	return 'Data is '.$req->txtname;
    }


}
