<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// hnhd code
Route::get('HoangDiem', function () {
    return 'Miss you so much !';
});

Route::get('HoangDiem/love', function () {
    return 'Do you love me ?';
});

// truyen tham so
Route::get('HoTen/{ten}', function($ten){
	return 'Her name is ' . $ten;
});

Route::get('today/{ten}', function($ten){
	echo 'Her name is ' . $ten;
})->where(['ten'=>'[a-zA-Z ]+']);		
// ràng buộc kiểu dữ liệu của tham số truyền
// trong trường hợp này ngay phải là ký tự a-z hoặc A-Z

// ================================
// Đinh danh Route
Route::get('Route1', function(){
	return 'Hallo leuter ';
})->name('hallo1');

Route::get('Route2', ['as'=>'hallo', function(){
	return "Guten Tag. Wie geht's ? Mir geht gut.";
}]);


Route::get('Call', function(){
	return redirect()->route('hallo');		// Gọi route có tên là hallo // giống hàm chuyển trang header
});

// ================================
// Route Group
Route::group(['prefix'=>'MyGroup'], function(){
	// Call User1 => domain/MyGroup/User1
	Route::get('User1', function(){
		return 'Ich bin User1. Und du?';
	});
	// Call User2 => domain/MyGroup/User2
	Route::get('User2', function(){
		return 'Ich bin User2. Und du?';
	});
	// Call User3 => domain/MyGroup/User3
	Route::get('User3', function(){
		return 'Ich bin User3. Und du?';
	});
});

// ================================
// Gọi controller MyController
Route::get('CallController/{name}','MyController@Hello');

// Call other route (it is declared in Farewell function)
Route::get('CallController2','MyController@Farewell');


// ================================
// Làm việc với URL trên Request
Route::get('callReqURL','MyController@GetURL');

// ================================
// call formDemo page
Route::get('viewFormDemo', function(){
	return view('formDemo');
});

// receive data from formDemo page
Route::post('postForm',['as'=>'postDemo', 'uses'=>'MyController@postDemo']);

// ================================
// Use cookie
Route::get('setCookie','MyController@setCookie');
Route::get('getCookie','MyController@getCookie');

// ================================
// demo upload file
Route::get('viewUploadDemo', 'MyController@viewUploadDemo');

Route::post('file-upload','MyController@fileUploadPost')->name('files.upload');

// ================================
// Demo returning json data
Route::get('getJson', 'MyController@getJson');

// ================================
// demo View
Route::get('myView', 'MyController@myView');

// ================================
// transfer param 'val' to MyController
Route::get('myValue/{val}','MyController@displayValue');

// share param 'shValue' to all views
// View::share('shValue','Hallo leuter');
View::share('shValue',array('say'=>'Hallo', 'person'=>'VHD'));

// ================================
// introduce blade template
// the pages will use the layouts/mainlayout for displaying on the browser
Route::get('bladeDemo/{str}', 'MyController@displayBladeDemo');

// ================================
// demo creating table on database
Route::get('createtbl', 'MyController@createTable');
Route::get('createtbl1', 'MyController@createTable1');
Route::get('droptbl1', 'MyController@dropTable1');

// ================================
// demo query data from the database
Route::get('qb/get/{tbl}','MyController@getUsers');

Route::get('qb/qr','MyController@getUser');

