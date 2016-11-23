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

Route::get('/construction-sites/{csite_id}/diaries/', array(
    'as' => 'list-diaries',
    'uses' => 'DiaryController@listDiaries'
));

// GET - Adding new diary
Route::get('/construction-sites/{csite_id}/diaries/add', array(
    'as' => 'add-diary',
    'uses' => 'DiaryController@addDiary'
));

// POST - Adding new diary
Route::post('/construction-sites/{csite_id}/diaries/added', array(
    'as' => 'added-diary',
    'uses' => 'DiaryController@postAddDiary'
));

// GET - Deleting selected diary
Route::get('/construction-sites/{csite_id}/diaries/delete/{diary_id}', array(
    'as' => 'deleteDiary',
    'uses' => 'DiaryController@deleteDiary'
));

// GET - View diary
Route::get('/construction-sites/{csite_id}/diaries/view/{diary_id}', array(
    'as' => 'view.diary',
    'uses' => 'DiaryController@viewDiary'
));

// GET RESPONSE - Diary images
Route::get('/diary-images/{filename}', array(
    'uses' => 'DiaryController@getDiaryImages',
    'as' => 'diary.image'
));

Auth::routes();

Route::get('/dashboard', array(
    'as' => 'dashboard',
    'uses' => 'HomeController@index'
));