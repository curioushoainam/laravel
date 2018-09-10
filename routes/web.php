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
Route::get('callFormDemo', function(){
	return view('formDemo');
});

// receive data from formDemo page
Route::post('postForm',['as'=>'postDemo', 'uses'=>'MyController@postDemo']);

// ================================
// Use cookie
Route::get('setCookie','MyController@setCookie');
Route::get('getCookie','MyController@getCookie');
