<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Carbon\Carbon;

Route::get('/', 'authController@getRoot');
Route::get('daftar', 'regisController@getRegis');
Route::post('daftar', 'regisController@postRegis');
Route::get('login', ['as' => 'login', 'uses' => 'loginController@getlogin']);
Route::post('login', 'loginController@postLogin');
Route::get('logout', 'authController@logout');

Route::get('datediff',function() {
  return view('datediff');
});

Route::post('datediff',function(){
  $date1 = Input::get('date1');
  $date2 = Carbon::parse(Input::get('date2'));
  $diffis = $date2->diffInSeconds($date1);
  $diff = gmdate('H:i:s', $diffis);
  return $diff;
});


/*
|--------------------------------------------------------------------------
| Auth Roles
|--------------------------------------------------------------------------
|
| Ini route buat yang udah login aja any roles
|
*/
//@auth user
Route::get('myprofile', 'authController@getMyProfile');
Route::get('editprofile', 'authController@getEditProfile');
Route::put('editprofile', 'authController@UpdateProfile');
Route::get('support', 'authController@getSupport');

/*
|--------------------------------------------------------------------------
| Admin Roles
|--------------------------------------------------------------------------
|
| Ini route buat roles admin
|
*/
// Sidebar Part
Route::get('sidebarsettings', 'WebAdminController@getSidebarSetting');
Route::post('addsidebar', 'WebAdminController@tambahSidebarAjax');
Route::get('sidebar/json', 'WebAdminController@sidebarDataTB')->name('sidebar/json');
Route::get('sidebar/{id}/edit', 'WebAdminController@editSidebar');
Route::post('sidebar/delete', 'WebAdminController@deleteSidebar');
Route::get('submenu/json/{id}', 'WebAdminController@submenuDataTB')->name('submenu/json/{id}');
Route::put('sidebar/{id}', 'WebAdminController@updateSidebar');
Route::post('addsubmenu', 'WebAdminController@PostAddSubmenu');
Route::post('deletesubmenu', 'WebAdminController@deleteSubmenu');
Route::post('editsubmenu', 'WebAdminController@editsubmenu');
Route::get('logodanfavicon', 'WebAdminController@logoweb');
Route::get('juduldanslogan', 'WebAdminController@judul');
Route::put('juduldanslogan', 'WebAdminController@updateJudulDanSlogan');

//Berita Part
Route::get('berita', 'WebAdminController@getBerita');
Route::get('berita/json', 'WebAdminController@beritaDataTB')->name('berita/json');
Route::get('tambahBerita', 'WebAdminController@getTambahBerita');
Route::post('berita', 'WebAdminController@postBerita');
Route::post('delete/berita', 'WebAdminController@deleteBerita');
Route::get('berita/{id}/edit','WebAdminController@getBeritaUpdate');
Route::put('berita/{id}/edit', 'WebAdminController@updateBerita');

//User SPA get and ajax part :
Route::get('user/json', 'WebAdminController@userDataTB')->name('user/json');
Route::get('manageuser', 'WebAdminController@manageuser');
Route::post('auth/register','WebAdminController@register');
Route::post('auth/edituser','WebAdminController@edituser');
Route::post('auth/delete','WebAdminController@deleteuser');

//roles
Route::get('roles', 'WebAdminController@getRoles');
Route::get('roles/json', 'WebAdminController@rolesDataTB')->name('roles/json');
Route::post('roles/edit', 'WebAdminController@editRoles');
//
Route::put('logodanfavicon', 'WebAdminController@postImageLogo');
