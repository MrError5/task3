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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

route::get('/post/{id}','AdminPostsController@post')->name('home.post');
route::get('/posts','AdminPostsController@allposts')->name('allposts');

// route::group(['prefix'=>'admin'],function(){

// });
route::group(['middleware'=>['admin','auth']],function(){

	// my route
route::get('admin',function(){

	return view('admin.index');
 });

	route::resource('admin/users','AdminUsersController');	
	route::resource('admin/posts','AdminPostsController');	
	route::resource('admin/categories','AdminCategoryController');	
	route::resource('admin/media','AdminMediasController');	

	//route::get('admin/media/upload','AdminMediasController@store')->name('upload');

	route::resource('admin/comments','PostCommentsController');

	route::resource('admin/comments/replies','CommentRepliesController');	



});

Route::group(['middleware'=>'auth'],function(){

	route::post('comment/reply','CommentRepliesController@createReply');	


});

Route::get('logout', 'AdminCategoryController@logout')->name('mylog');

