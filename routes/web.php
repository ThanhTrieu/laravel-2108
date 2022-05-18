<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('demo', function () {
    return "Hi you - demo";
})->name('demo');

// cac phuong thuc truy cap routing
Route::prefix('api')->group(function () {
    Route::post('login', function () {
        return "logined";
    });
    Route::put('method-put', function(){
        return "method put";
    });
    Route::delete('method-delete', function () {
        return "method delete";
    });
});
// tham so truyen len routing
// 1-tham so bat buoc
Route::get('detail/{name}/{id}', function($namePd, $idPd) {
    // {id} : tham
    // $idPd : bien nhan gia tri tu tham so truyen vao
    return "San pham {$namePd} co ID - {$idPd}";
});
// localhost:8000/detail/iphone-13/10
// 2 - tham so tuy chon (khong bat buoc)
Route::get('profile/{name}/{age?}', function($name, $age = null) {
    return "my name : {$name} - age : {$age}";
})->where(['name' => '[A-Za-z]+', 'age' => '\d+']);
// localhost:8000/profile/teo/10
// validation params - bang regular expression

// dat ten cho routing

Route::get('login', function(){
    // tu dong chuyen qua trang dashboard
    //return redirect()->route('admin.home'); // 'home' : ten cua routing
    return redirect()->route('admin.brand');
});
// localhost:8000/login

// routing view
Route::get('test-view', function(){
    return view('test'); // tra ve thang 1 view
});

Route::get('production/{name}/{token}', function($name, $token){
    return "name of product : {$name} - token : {$token}";
})->middleware('check.token'); // routing se bi kiem tr boi middleware
// localhost:8000/production/samsung/fdsfsdfs
// // localhost:8000/production/samsung/php2108e

Route::get('watch-film/{name}/{age}', function($name, $age) {
    return "Ban da {$age} - nen duoc xem phim {$name}";
})->name('watch-film')->middleware('check.age:user'); // :admin - tham so truyen vao middleware

Route::get('do-not-watch-flim', function(){
    return "Ban chua du tuoi de xem";
})->name('do-not-watch-flim');

//localhost:8000/watch-film/batman/18
//localhost:8000/watch-film/batman/16

// csrf_token();
Route::get('render-token', function(){
    $token = csrf_token();
    return $token;
});
//localhost:8000/render-token
Route::get('render-token-view', function(){
    return view('test');
});
*/