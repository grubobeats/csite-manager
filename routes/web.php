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

// GET - Change language
Route::post('/choose-language/{lang}', function($lang){
    Lang::setLocale($lang);
    Session::set('locale', $lang);

//    return redirect()->back();
    return "ok";
})->name('language');

/**
 * Just for authenticated users
 */

Route::get('/workers', array(
    'as' => 'list-workers',
    'uses' => 'WorkersController@list_workers'
));



Route::get('/construction-sites/add', array(
    'as' => 'add-csite',
    'uses' => 'ConstructionSiteController@index',
))->middleware('auth');

Route::post('/construction-sites/added', array(
    'as' => 'added-csite',
    'uses' => 'ConstructionSiteController@addNewConstructionSite'
))->middleware('auth');

Route::post('/construction-sites/edit/{csite_id}/edited', array(
    'as' => 'edited-csite',
    'uses' => 'ConstructionSiteController@post_editConstructionSite'
))->middleware('auth');

Route::get('/construction-sites/delete/{csite_id}', array(
    'as' => 'deleteConstructionSite',
    'uses' => 'ConstructionSiteController@deleteConstructionSite'
))->middleware('auth');

Route::get('/construction-sites/edit/{csite_id}', array(
    'as' => 'editConstructionSite',
    'uses' => 'ConstructionSiteController@editConstructionSite'
))->middleware('auth');

Route::get('/construction-sites/{csite_id}/diaries/', array(
    'as' => 'list-diaries',
    'uses' => 'DiaryController@listDiaries'
))->middleware('auth');

// GET - Adding new diary
Route::get('/construction-sites/{csite_id}/diaries/add', array(
    'as' => 'add-diary',
    'uses' => 'DiaryController@addDiary'
))->middleware('auth');

// POST - Adding new diary
Route::post('/construction-sites/{csite_id}/diaries/added', array(
    'as' => 'added-diary',
    'uses' => 'DiaryController@postAddDiary'
))->middleware('auth');

// GET - Editing exiting diary
Route::get('/construction-sites/{csite_id}/diaries/{diary_id}/edit', array(
    'as' => 'edit.diary',
    'uses' => 'DiaryController@editDiary'
))->middleware('auth');

// POST - Editing exiting diary
Route::post('/construction-sites/{csite_id}/diaries/{diary_id}/edited', array(
    'as' => 'edited.diary',
    'uses' => 'DiaryController@postEditDiary'
))->middleware('auth');

// GET - Deleting selected diary
Route::get('/construction-sites/{csite_id}/diaries/delete/{diary_id}', array(
    'as' => 'deleteDiary',
    'uses' => 'DiaryController@deleteDiary'
))->middleware('auth');

// GET - View diary
Route::get('/construction-sites/{csite_id}/diaries/view/5948972347694{diary_id}7657', array(
    'as' => 'view.diary',
    'uses' => 'DiaryController@viewDiary'
))->middleware('auth');

// GET RESPONSE - Diary images
Route::get('/diary-images/{filename}', array(
    'uses' => 'DiaryController@getDiaryImages',
    'as' => 'diary.image'
));

// GET - Delete particular image
Route::get('/diary-images/{image_id}/delete', array(
    'as' => 'delete.image',
    'uses' => 'DiaryController@deleteImage'
))->middleware('auth');

// GET - Guest link
Route::get('/{language}/view-diary/45096{csite_id}234098432/{diary_id}/{random_link}', array(
    'as' => 'guests.link',
    'uses' => 'DiaryController@showDiaryToGuest'
));

// GET - Sending Email
Route::post('/lkk432359{diary_id}4981ljh/fdsfdsf{csite_id}fsdfs/sent-mail', array(
    'as' => 'mail.send.diary',
    'uses' => 'MailController@sendDiary'
));

/***************  Proccessing payments ***************/

// GET - 1. Go to subscription page
Route::get('/subscription', array(
  'as' => 'checkout',
  'uses' => 'PaymentsController@pay'
));

// POST - 2. Process subscription
Route::get('/subscribed', array(
    'as' => 'subscription.checkout',
    'uses' => 'PaymentsController@makeSubscription'
));


Route::post('/subs/', array(
    'as' => 'ajax-payment',
    'uses' => 'BillingController@makeSubscription'
));





// 1. GET - Go to checkout page
Route::get('/donation', array(
    'as' => 'donation',
    'uses' => 'PaymentsController@donate'
));

// 2. POST - Go to checkout page
Route::post('/checkout-donated', array(
  'as' => 'post.checkout',
  'uses' => 'PaymentsController@postPay'
));

// 3. GET - Thank you page (going after checkout)
Route::get('/checkout/success', array(
    'as' => 'checkout.success',
    'uses' => 'PaymentsController@success'
));

/*********************** Billing **********************/

// GET - Billing page
Route::get('/billing', array(
    'as' => 'billing',
    'uses' => 'BillingController@index'
))->middleware('auth');

Route::post('/billing/cancel', array(
    'as' => 'cancel-subscription',
    'uses' => 'BillingController@cancelSubscription'
))->middleware('auth');

/***************  Generated by Laravel ***************/

Auth::routes();

Route::get('/dashboard', array(
    'as' => 'dashboard',
    'uses' => 'HomeController@index'
));

Route::get('/landing1', function() {
    return view('landing/landing');
});