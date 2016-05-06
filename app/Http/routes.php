<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    

    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::group(['middleware' => 'web'], function () {
    Route::auth();

	Route::group(['middleware' => 'Admin'], function () {
    	
		// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		// VueJS test routes
		Route::get('adminVue', function(){
			
			return view('admin.adminVue');
		});
		Route::get('allmessages', function(){
			$allposts = App\Posts::all();
			$allposts->load('postMetaData');
			return $allposts;
			
			$allposts = App\Posts::with('postMetaData')->get();
			return $allposts;
		});


		// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    	// Admin routes here
		Route::get('adminindex', 'AdminController@index');
		// Posts
		// Show  Posts
			Route::get('adminposts/{page_number?}', 'AdminController@showPosts');
			Route::post('adminposts/{page_number?}', 'AdminController@adminPost');
			// Set Post Active/Inactive
			Route::post('setPostStatus', 'AdminController@setPostStatus');
		// Show Editor
			Route::get('editor', 'AdminController@showEditor');
			Route::get('editPost/{post_id}', 'AdminController@editPost');
			Route::post('editor', 'AdminController@savePost');
			Route::post('editPost/editor', 'AdminController@savePost');
			Route::get('sysinfo', 'AdminController@showSysInfo');
		// Show Assets
			//Route::get('assets/{path?}', 'AssetController@showAssets');
			Route::get('assets/', 'AssetController@showAssets');
		// Preview Post
			Route::get('previewPost/{post_id}', 'AdminController@previewPost');

	});
    Route::get('/userhome', 'HomeController@index');

});
