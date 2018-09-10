<?php
// lệnh tạo controller từ cmd folder chủ 
// php artisan make:controller MyController

namespace App\Http\Controllers;

use Illuminate\Http\Response; 	// hnhd code
use Illuminate\Http\Request;

class MyController extends Controller
{
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

    public function setCookie(){
    	// the function set a cookie 
    	$resp = new Response;
    	echo 'Set up a cookie';
    	$resp->withCookie("vhd","hallo HDHN", 0.2); 
    	// that is named "vhd" and contains "hallo HDHN" and live in 0.2 minutes   	
    	return $resp;
    }

    public function getCookie(Request $req){
    	return $req->cookie("vhd");
    	// return value which is stored in the cookie "vhd"
    }

    public function viewUploadDemo(){
    	// the function display file uploadDemo on the browser
    	return view('uploadDemo');
    }

    public function fileUploadPost(Request $req){
    	// the function upload chosen file to the folder public/migs
    	
    	$this->viewArr($req->file('myFile'));
    	// $req->file('myFile')->getClientSize() => return file's size in byte
    	// $req->file('myFile')->getClientMimeType() => return file's type
    	// $req->file('myFile')->getClientOriginalName() => return file's name
    	// $req->file('myFile')->getClientOriginalExtension() => return file's extention
    	// $req->file('myFile')->isValid() => return TRUE if the file is uploaded to temporary location successfully

    	// 1. Check whether the file is available
    	if($req->hasFile('myFile')){
    		// 'myFile' is the name of input on the 'uploadDemo' file
    		$imageName = $req->file('myFile')->getClientOriginalName();
    		$result = $req->file('myFile')->move(
    			public_path('imgs'),		// where to store the file
    			$imageName		// new filename
    		);

    		// $result contains the specified path of uploaded file    		
    		echo 'result is '.$result;
    		// result is C:\wamp64\www\Laravel\myLaravel\public\imgs\1536568997.png

    	} else {
    		echo 'File is unavailable';
    	} 
    }

    public function getJson(){
    	$arr = ['myLover'=>'VHD'];
    	return response()->json($arr);
    }

    public function myView(){
    	// return view('homepage');		// the 'hompage' is the homepage.php file inside the views folder
    	return view('myView.subView'); 	// the 'myView.subView'' means that the subView.php file inside the views/myView folder 
    }

    public function displayValue($val){
    	// transfer param 'value' to the homepage.php
    	return view('homepage',['value'=>$val*2, 'valuex3'=>$val*3]);

    }

    public function displayLaravel(){
    	// display the laravel page on the browser
    	return view('pages.laravel');
    }

    public function displayPhp(){
        // display the php page on the browser
        return view('pages.php');
    }

}
