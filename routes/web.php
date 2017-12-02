<?php

Route::get('/', 'PagesController@home');
Route::get('/messages/{message}','MessagesController@show');

Route::get('profile/{username}','UsersController@show');

Route::group(['middleware'=>'auth'],function()
{
	Route::get('/messages','MessagesController@search');
	
	Route::post('/messages/create','MessagesController@create');
	Route::post('/{username}/follow','UsersController@follow');
	Route::post('/{username}/unfollow','UsersController@unfollow');
	Route::post('/{username}/dms','UsersController@sendPrivateMessage');
	Route::get('/conversations/{conversation}','UsersController@showConversation');
});

Route::get('/{username}/follows','UsersController@follows');
Route::get('/{username}/followers','UsersController@followers');

Route::get('/{username}/followers','UsersController@followers');



//rutas facebook
Route::get('/auth/facebook','SocialAuthController@facebook');
Route::get('/auth/facebook/callback','SocialAuthController@callback');
Route::post('/auth/facebook/register','SocialAuthController@register');

Auth::routes();


