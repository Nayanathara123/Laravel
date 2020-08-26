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
    return view('login');
});


Route::post('/doLogin', [
   'uses' => 'loginController@doLogin',
   'as' => 'login.doLogin'
]);


Route::group(['middleware' => 'checkuser'], function(){
	
	Route::group(['middleware' => 'userMgtPermission'], function(){

		Route::get('/manage_user', [
		   'uses' => 'loginController@manage_user',
		   'as' => 'login.manage_user'
		]);

		Route::get('/log_user', [
		   'uses' => 'loginController@log_user',
		   'as' => 'login.log_user'
		]);
		
		Route::post('/store', [
		   'uses' => 'loginController@store',
		   'as' => 'login.store'
		]);

		Route::get('/display_user_edit/{user_id}', [
		   'uses' => 'loginController@display_user_edit',
		   'as' => 'login.display_user_edit'
		]);

		Route::post('/update', [
		   'uses' => 'loginController@update',
		   'as' => 'login.update'
		]);

		Route::post('/delete', [
		   'uses' => 'loginController@delete',
		   'as' => 'login.delete'
		]);

	});

	Route::get('/logout', [
	   'uses' => 'loginController@logout',
	   'as' => 'login.logout'
	]);

	Route::get('/display_access_denied', [
	   'uses' => 'loginController@display_access_denied',
	   'as' => 'login.display_access_denied'
	]);

	Route::get('/redirect_access_denied', [
	   'uses' => 'loginController@redirect_access_denied',
	   'as' => 'login.redirect_access_denied'
	]);


	Route::post('/add_user_roles', [
	   'uses' => 'userRolesController@add_user_roles',
	   'as' => 'roles.add_user_roles'
	]);

	Route::get('/display_roles', [
	   'uses' => 'userRolesController@display_roles',
	   'as' => 'roles.display_roles'
	]);

	Route::get('/display_role_edit/{role_id}', [
	   'uses' => 'userRolesController@display_role_edit',
	   'as' => 'roles.display_role_edit'
	]);

	Route::post('/role_edit', [
	   'uses' => 'userRolesController@role_edit',
	   'as' => 'roles.role_edit'
	]);

	Route::post('/role_delete', [
	   'uses' => 'userRolesController@role_delete',
	   'as' => 'roles.role_delete'
	]);

	Route::post('/add_permission', [
	   'uses' => 'userPermissionController@add_permission',
	   'as' => 'permission.add_permission'
	]);

	Route::get('/display_permission_list', [
	   'uses' => 'userPermissionController@display_permission_list',
	   'as' => 'permission.display_permission_list'
	]);

	Route::get('/display_permission_edit/{id}', [
	   'uses' => 'userPermissionController@display_permission_edit',
	   'as' => 'permission.display_permission_edit'
	]);

	Route::post('/edit_permission', [
	   'uses' => 'userPermissionController@edit_permission',
	   'as' => 'permission.edit_permission'
	]);

	Route::post('/delete_permission', [
	   'uses' => 'userPermissionController@delete_permission',
	   'as' => 'permission.delete_permission'
	]);

	Route::get('/display_profile', [
	   'uses' => 'userProfileController@display_profile',
	   'as' => 'profile.display_profile'
	]);

	Route::post('/edit_user_profile', [
	   'uses' => 'userProfileController@edit_user_profile',
	   'as' => 'profile.edit_user_profile'
	]);

	Route::post('/change_avatar', [
	   'uses' => 'userProfileController@change_avatar',
	   'as' => 'profile.change_avatar'
	]);

	/* text description controller function */
	Route::get('/display_text_list', [
	   'uses' => 'textDescriptionController@display_text_list',
	   'as' => 'text.display_text_list'
	]);

	Route::get('/view_text/{id}', [
	   'uses' => 'textDescriptionController@view_text',
	   'as' => 'text.view_text'
	]);

	Route::get('/display_text_add', [
	   'uses' => 'textDescriptionController@display_text_add',
	   'as' => 'text.display_text_add'
	]);

	Route::post('/add_text', [
	   'uses' => 'textDescriptionController@add_text',
	   'as' => 'text.add_text'
	]);

	Route::get('/display_edit_text/{id}', [
	   'uses' => 'textDescriptionController@display_edit_text',
	   'as' => 'text.display_edit_text'
	]);

	Route::post('/edit_text', [
	   'uses' => 'textDescriptionController@edit_text',
	   'as' => 'text.edit_text'
	]);

	/* Client controller function */
	Route::get('/display_client_list', [
	   'uses' => 'clientController@display_client_list',
	   'as' => 'client.display_client_list'
	]);

	Route::get('/view_client/{id}', [
	   'uses' => 'clientController@view_client',
	   'as' => 'client.view_client'
	]);

	Route::get('/display_client_add', [
	   'uses' => 'clientController@display_client_add',
	   'as' => 'client.display_client_add'
	]);

	Route::post('/client.add_client', [
	   'uses' => 'clientController@add_client',
	   'as' => 'client.add_client'
	]);

	Route::get('/display_client_edit/{id}', [
	   'uses' => 'clientController@display_client_edit',
	   'as' => 'client.display_client_edit'
	]);

	Route::post('/edit_client', [
	   'uses' => 'clientController@edit_client',
	   'as' => 'client.edit_client'
	]);

	Route::post('/delete_client', [
	   'uses' => 'clientController@delete_client',
	   'as' => 'client.delete_client'
	]);


	/* News controller function */
	Route::get('/display_news_list', [
	   'uses' => 'newsController@display_news_list',
	   'as' => 'news.display_news_list'
	]);

	Route::get('/display_news_add', [
	   'uses' => 'newsController@display_news_add',
	   'as' => 'news.display_news_add'
	]);

	Route::post('/add_news', [
	   'uses' => 'newsController@add_news',
	   'as' => 'news.add_news'
	]);

	Route::get('/view_news/{id}', [
	   'uses' => 'newsController@view_news',
	   'as' => 'news.view_news'
	]);

	Route::get('/display_news_edit/{id}', [
	   'uses' => 'newsController@display_news_edit',
	   'as' => 'news.display_news_edit'
	]);

	Route::post('/edit_news', [
	   'uses' => 'newsController@edit_news',
	   'as' => 'news.edit_news'
	]);

	Route::post('/delete_news', [
	   'uses' => 'newsController@delete_news',
	   'as' => 'news.delete_news'
	]);
	
});





