<?php
// lệnh tạo controller từ cmd folder chủ 
// php artisan make:controller MyController

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

// hnhd code
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use DB;

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

    public function displayBladeDemo($str){
        $course = "<i>Learning Laravel</i>";
        if($str == 'laravel')
        	// display the laravel page on the browser
        	return view('pages.laravel',['course'=>$course]);
        if ($str == 'php')
            // display the php page on the browser
            return view('pages.php',['course'=>$course]);
    }

    public function createTable(){
       
        // the function creates a table on database
        // name: loaisanpham
        // columns : id, ten
        if (Schema::hasTable('loaisanpham')) {
            return 'the table is available';
        } else {
            Schema::create('loaisanpham', function($table){
                $table->increments('id');            
                $table->string('ten',50)->nullable();
            });
            return 'Already created the table';
        }
        
    }

    // Schema function ->  https://laravel.com/docs/5.0/schema
    public function createTable1(){
       
        // the function creates a table on database
        // name: sanpham
        // columns : id, ten, gia, soluong, lsp_id
        if (Schema::hasTable('sanpham')) {
            return 'the table is available';
        } else {
            Schema::create('sanpham', function($table){
                $table->increments('id');            
                $table->string('ten')->nullable();
                $table->integer('gia')->default(0);
                $table->integer('soluong')->default(0);
                $table->integer('lsp_id')->unsigned();
                $table->foreign('lsp_id')->references('id')->on('loaisanpham')->onDelete('cascade');
            });
            return 'Already created the table';
        }
        
    }

    public function dropTable1(){
        if (Schema::hasTable('sanpham')) {
            //Schema::drop('sanpham');
            Schema::dropIfExists('sanpham');
            return 'Already dropped the table';            
        } else {
            return 'the table is unavailable';
        }
    }
    
    public function getUsers($tbl){
        // the function gets all data on the table $tbl
        $data = DB::table($tbl)->get();
        $this->viewArr($data);
    }

    public function getUser($tbl='users'){
        // the function gets all data on the table $tbl
        $data = DB::table($tbl)->select(DB::raw('id, name as hoten,email'))->where('id','>',0)->orderBy('id','desc')->skip(1)->take(2)->get();
        $this->viewArr($data);
    }

    public function update($tbl='users'){
        // the function update item #1 the table $tbl
        $result = DB::table($tbl)->where('id',1)->update(['name'=>'VHD','email'=>'vhd@xmail.com']);
        $this->viewArr($result);    // returned data is true/false
    }

    public function delete($tbl='users'){
        // the function delete item #1 the table $tbl
        $result = DB::table($tbl)->where('id',1)->delete();
        $this->viewArr($result);    // returned data is true/false
    }

    public function truncate($tbl='users'){
        // the function clears all data on the table $tbl and increment data returns to 0
        $result = DB::table($tbl)->truncate();
        $this->viewArr($result);    // no returned data
    }

   
    public function mdsave(){
        // model function
        // the function inserts new data into the table users
        $user = new \App\User();

        $user->name = 'nld';
        $user->email = 'nld@xmail.com';
        $user->password = encrypt('123456');

        $result = $user->save();
        $this->viewArr($result);    // returned data is true/false
    }

    public function mdqr(){
        // model function
        // the function get data on the table users
        $user = \App\User::find(7);     // look for item #id=7    
        $this->viewArr($user);

    }    

    public function input(){
        // the function demos $_GET multiple parameters /?name=hn&lastname=hd
        //$this->viewArr(Input::all());
        echo Input::get('name');
        echo '<br>';
        echo Input::get('lastname'); 
    }

    public function mdinsrt($lsp){
        // the function insert $lsp into the table
        $loaisanpham = new \App\loaisanpham();

        $loaisanpham->ten = $lsp;

        $result = $loaisanpham->save();
        if($result) 
            echo 'Insert ' . $lsp . ' successfully.';
        else
            echo 'Failed to insert ' . $lsp;
    }

    public function mdgetall(){    
        // the function get all data from the table
        $loaisanpham = new \App\loaisanpham();

        // $data = $loaisanpham::all();
        // $data = $loaisanpham::all()->toJson();
        $data = $loaisanpham::all()->toArray();
        $this->viewArr($data);
    }

    public function mdgetqrbd($id){
        // the function get data of $id from the table
        $loaisanpham = new \App\loaisanpham();

        // $data = $loaisanpham::where('id',$id);
        // $data = $loaisanpham::where('id',$id)->get()->toJson();
        $data = $loaisanpham::where('id',$id)->get()->toArray();
        $this->viewArr($data);
    }

    public function mdgetmqrbd(){
        // the function get all data from the table
        $loaisanpham = new \App\loaisanpham();        
        
        $data = $loaisanpham::where('id','!=',0)->orderBy('ten','desc')->get()->toArray();
        $this->viewArr($data);
    }

    public function mddel($id){
        // the function delete item $id on the table
        $loaisanpham = new \App\loaisanpham();

        $result = $loaisanpham::destroy($id);
        if($result) 
            echo 'Delete ' . $id . ' successfully.';
        else
            echo 'Failed to delete ' . $id;
    }

    public function mddel2($name){
        // the function delete item $id on the table
        $loaisanpham = new \App\loaisanpham();

        $result = $loaisanpham::where('ten',$name)->delete();
        if($result) 
            echo 'Delete ' . $name . ' successfully.';
        else
            echo 'Failed to delete ' . $name;
    }

    public function splinklsp($sp_id){
        // link model sanpham to model loaisanpham
        $data = \App\SanPham::find($sp_id)->loaisanpham->toArray();
        if(isset($data) && $data){            
            $this->viewArr($data);
        }
        else
            echo 'Unavailable';
    }

    public function lsplinksp($lsp_id){
        // link model loaisanpham to model sanpham
        $data = \App\loaisanpham::find($lsp_id)->sanpham->toArray();
        if(isset($data) && $data){            
            $this->viewArr($data);
        }
        else
            echo 'Unavailable';
    }


}
