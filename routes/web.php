<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    Lang::setLocale(Session::get('locale'));

    return view('welcome');
});

Route::post('/language', array(
    'before' => 'csrf',
    'as' => 'language-chooser',
    'uses' => 'LanguageController@chooser'
));

Route::get('/construction-sites/add', array(
    'as' => 'add-csite',
    'uses' => 'ConstructionSiteController@index',
));

Route::post('/construction-sites/added', array(
    'as' => 'added-csite',
    'uses' => 'ConstructionSiteController@addNewConstructionSite'
));

Route::post('/construction-sites/edit/{csite_id}/edited', array(
    'as' => 'edited-csite',
    'uses' => 'ConstructionSiteController@post_editConstructionSite'
));

Route::get('/construction-sites/delete/{csite_id}', array(
    'as' => 'deleteConstructionSite',
    'uses' => 'ConstructionSiteController@deleteConstructionSite'
));

Route::get('/construction-sites/edit/{csite_id}', array(
    'as' => 'editConstructionSite',
    'uses' => 'ConstructionSiteController@editConstructionSite'
));

Auth::routes();

Route::get('/dashboard', array(
    'as' => 'dashboard',
    'uses' => 'HomeController@index'
));