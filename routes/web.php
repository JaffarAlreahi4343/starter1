<?php

use Illuminate\Support\Facades\Route;
//use Illuminate\Foundation\Auth\User as Auth;
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
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/', function () {
    $data=[];
    $data['id']=5;
    $data['name']='jaffar';

    $obj = new \stdClass();
    $obj->name = 'jaffar';
    $obj->id = 5;
    $obj->gender = 'male';
    return view('welcome',compact('obj'));
});

Route::get('/test1', function () {
    return 'welcome';
});

Route::get('/landing', function () {
    return view('landing');
});

Route::get('/about', function () {
    return view('about');
});
Route::get('/show-number/{id}', function ($id) {
    return $id;
})->name('a');


Route::get('/show-string/{id?}', function () {
    return 'welcome';
})->name('b');

// Route::namespace('Front')->group(function(){
//     //all route  only access controller  or methods  in folder name Front

//         Route::get('users','UserController@showUserName');
//     });

// Route::prefix('users')->group(function(){
//         Route::get('show','UserController@showUserName');
//         Route::get('delete','UserController@showUserName');
//         Route::get('edit','UserController@showUserName');
//         Route::get('update','UserController@showUserName');
// });


Route::group(['prefix'=>'users','middlware'=>'auth'],function(){

        Route::get('/',function(){
                return 'work';
        });
        // Route::get('show','UserController@showUserName');
        // Route::get('delete','UserController@showUserName');
        // Route::get('edit','UserController@showUserName');
        // Route::get('update','UserController@showUserName');


});
Route::get('check',function(){
    return 'middlware';
})->middleware('auth');

Route::resource('news','NewsController');





Route::group(['namespace'=>'Admin'],function(){
    Route::get('second','SecondController@showstring0')->middleware('auth');
    Route::get('second1','SecondController@showstring1');
    Route::get('second2','SecondController@showstring2');
    Route::get('second3','SecondController@showstring3');
});

// Route::get('login',function(){
//         return 'must be login to access this route';
// })->name('login');


Route::get('index','Front\UserController@getIndex');


