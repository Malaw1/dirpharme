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
    return view('auth/login');
});

Route::post('upload', function(){
    request()->file('file')->store(
        'modules',
        's3'
    );
})->name('upload');

Route::get('payment', function () {
    return view('payment/index');
});

Route::get('form', function () {
    return view('demande/form');
});

Route::get('registered', function () {
    return view('auth/temp-register');
});

Route::get('renouvellement', function () {
    return view('renouvellement/index');
});

Route::get('variation', function () {
    return view('variation/index');
});

Route::get('visa', function () {
    return view('visa/index');
});

Route::get('events', 'EventController@index')->name('events');
Route::get('event', 'EventController@addEvent')->name('addEvent');

Route::get('register-user', function () {
    return view('auth/register-user');
});

Route::resource('pharmacien', 'PharmacienController');
Route::resource('request', 'RequestController');
Route::resource('evaluation', 'EvaluationController');
Route::resource('users', 'UserController');
Route::resource('recevabilite', 'RecevabiliteController');

Route::get('mail', 'MailController@index');
Route::post('mail/send', 'MailController@send');
Route::post('mail/recevabilite', 'MailController@recevabilite');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('agence', 'AgenceController');
Route::resource('commission', 'CommissionController');
Route::resource('demande', 'DemandeController');
Route::resource('laboratoire', 'LaboratoireController');
Route::resource('produit', 'ProduitController');
Route::resource('substance', 'SubstanceController');
Route::resource('motivation', 'MotivationController');
Route::resource('paiement', 'PaiementController');
Route::resource('dossier', 'DossierController');
Route::post('submit', 'SubmitController@index')->name('submit');
Route::resource('autorisation', 'AutorisationController');

Route::get('qr-code', function () {

    return QrCode::size(500)->generate('Generation du Code QR de l"AMM');
});

Route::get('/demande/showFile/{$id}/{$fileName}','DepotController@pdf');

Route::get('showFile', function () {
    return view('demande/showFile');
});

Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');
