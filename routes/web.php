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
Route::get('/cls', function() {
        $run = Artisan::call('config:clear');
        $run = Artisan::call('cache:clear');
        $run = Artisan::call('config:cache');
        Session::flush();
        return 'FINISHED';
    });



Route::get('/', function () {
    return view('welcome');
});
Route::get('/log_in', function () {
    return view('login');
});

Route::get('/regis', function () {
    return view('regis');
});

Route::get('/newsletter', function () {
    return view('news_later');
});
Route::get('/pp', function () {
    return view('pp');
});
Route::get('/tos', function () {
    return view('tos');
});
Route::get('/dis', function () {
    return view('dis');
});

Route::get('/token', function () {
    return view('token');
});
Route::get('/topgainer', function () {
    return view('topgainer');
});
Route::get('/new', function () {
    return view('new');
});
Route::get('/audit', function () {
    return view('audit');
});
Route::get('/KYC', function () {
    return view('kyc');
});
Route::get('/FAQ', function () {
    return view('faq');
});

Route::get('/mytelegram', function () {
    return view('mytelegram');
});


Route::get('/contact_us', [App\Http\Controllers\WebsiteController::class, 'promote']);
Route::get('/promote', [App\Http\Controllers\WebsiteController::class, 'promote2']);

Route::get('see_all_coin', [App\Http\Controllers\userController::class, 'see_all_coin']);

Route::any('/vote',[App\Http\Controllers\userController::class, 'vote']);
Route::any('/un_vote',[App\Http\Controllers\userController::class, 'un_vote']);

Route::any('/devote',[App\Http\Controllers\userController::class, 'devote']);
Route::any('/un_devote',[App\Http\Controllers\userController::class, 'un_devote']);
Route::post('/subscribe',[App\Http\Controllers\userController::class, 'subscribe']);
Route::post('/sendemail/send', [App\Http\Controllers\SendEmailController::class, 'send']);
Route::any('/coins/{id}',[App\Http\Controllers\userController::class, 'p_dt']);


Route::any('/vote_guest',[App\Http\Controllers\userController::class, 'vote_guest']);




Route::prefix('/admins')->middleware(['auth','admin'])->group(function (){

    Route::get('/index', function () {
        return view('admin.index');
    });
    Route::get('/user', function () {
        return view('admin.user');
    });
    Route::get('/coin', function () {
        return view('admin.coin');
    });
    Route::get('/new_later', function () {
        return view('admin.new_later');
    });
    Route::get('/sub', function () {
        return view('admin.sub');
    });
    Route::get('/slider_img', function () {
        return view('admin.contact');
    });
    Route::get('/ban_img', function () {
        return view('admin.ban_img');
    });

    Route::get('/contact', function () {
        return view('admin.contact1');
    });
    Route::any('/permote/{id}',[App\Http\Controllers\userController::class, 'permote']);
    Route::any('/un_permote/{id}',[App\Http\Controllers\userController::class, 'un_permote']);
    Route::any('/update_vote',[App\Http\Controllers\userController::class, 'update_vote']);
    Route::any('/approve/{id}',[App\Http\Controllers\userController::class, 'approve']);
    Route::get('/add_coin', function () {
        return view('add_coin');
        });
    Route::get('/get_see_all',[App\Http\Controllers\userController::class, 'get_see_all_admin']);
    Route::get('/get_see_all2',[App\Http\Controllers\userController::class, 'get_see_all_admin2']);


    Route::any('/del_user/{id}',[App\Http\Controllers\userController::class, 'del_user']);
    Route::any('/edit_user/{id}',[App\Http\Controllers\userController::class, 'edit_user']);
    Route::any('/update_user/{id}',[App\Http\Controllers\userController::class, 'update_user']);
    Route::any('/del_msg/{id}',[App\Http\Controllers\userController::class, 'del_msg']);

    Route::get('/promote',[App\Http\Controllers\AdminController::class, 'promote']);
    Route::post('/update-promote',[App\Http\Controllers\AdminController::class, 'update_promote'])->name('update.promote');

    Route::get('/footer',[App\Http\Controllers\AdminController::class, 'footer']);
    Route::post('/update-footer',[App\Http\Controllers\AdminController::class, 'update_footer'])->name('update.footer');

    Route::get('/email',[App\Http\Controllers\AdminController::class, 'email']);
    Route::post('/update-email',[App\Http\Controllers\AdminController::class, 'update_email'])->name('update.email');




});





Route::view('user/buy_bol','buy_bol');
Route::post('user/searchCoin',[App\Http\Controllers\userController::class,'searchCoin']);

Route::prefix('/user')->middleware(['auth','user'])->group(function (){

    Route::get('/add_coin', function () {
        return view('add_coin');
        });
      

    Route::post('/coin_save',[App\Http\Controllers\userController::class, 'coin_save']);
    Route::post('/com_save',[App\Http\Controllers\userController::class, 'com_save']);
    Route::post('/audit',[App\Http\Controllers\userController::class, 'audit']);
    Route::post('/kyc',[App\Http\Controllers\userController::class, 'kyc']);
    










});

Route::post('/user/contact',[App\Http\Controllers\userController::class, 'contact']);


 Route::get('/user/get_see_all_new',[App\Http\Controllers\userController::class, 'get_see_all_new']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('auth/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback']);


Route::get('auth/facebook',[App\Http\Controllers\Auth\FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback',[App\Http\Controllers\Auth\FacebookController::class, 'handleFacebookCallback']);




 Route::any('/coin_edit/{id}',[App\Http\Controllers\userController::class, 'coin_edit']);
    Route::any('/update_coin/{id}',[App\Http\Controllers\userController::class, 'update_coin']);
    Route::any('/coinUpdate/{id}',[App\Http\Controllers\AdminController::class, 'coinUpdate']);


 Route::post('/save_img',[App\Http\Controllers\userController::class, 'save_img']);
 Route::get('/img_del/{id}',[App\Http\Controllers\userController::class, 'img_del']);


 Route::post('/ban_save_img',[App\Http\Controllers\userController::class, 'ban_save_img']);
 Route::get('/ban_img_del/{id}',[App\Http\Controllers\userController::class, 'ban_img_del']);

 Route::get('/coin_del/{id}',[App\Http\Controllers\userController::class, 'coin_del']);




 Route::get('user/get_see_all',[App\Http\Controllers\userController::class, 'get_see_all']);



