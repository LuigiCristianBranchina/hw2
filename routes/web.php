<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;

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


Route::post('accedi', 'App\Http\Controllers\LoginController@log');
Route::post('ins', 'App\Http\Controllers\SignupController@inserisci');
Route::get('col', 'App\Http\Controllers\CollectionController@collection');
Route::get('do_search', 'App\Http\Controllers\DoSearchController@DoSearch');
Route::get('add_playlist', 'App\Http\Controllers\DoSearchController@addPlaylist');
Route::post('add_video', 'App\Http\Controllers\DoSearchController@addVideo');
Route::get('delete_video', 'App\Http\Controllers\DoSearchController@deleteVideo');
Route::get('delete_playlist', 'App\Http\Controllers\DoSearchController@deletePlaylist');
Route::get('vericaUser', 'App\Http\Controllers\LoginController@verifyUser');


Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});


Route::get('/index', function () {

   $sessione=Session::get('username');
   $strqry = DB::select("SELECT id FROM utente where username= '".Session::get('username')."'");    
   $query=DB::select("SELECT * FROM playlist WHERE creatore='".$strqry[0]->id."'");
    return view('home')
    ->  with("s", $sessione)
    ->  with("playlist", $query)
    ->  with("plays", $strqry);
});

Route::get('/search', function () {


    $sessione=Session::get('username');

    if($sessione ==  null){
        return view('login');
    }
    $strqry = DB::select("SELECT id FROM utente where username= '".Session::get('username')."'");    
    $query=DB::select("SELECT nome FROM playlist WHERE creatore='".$strqry[0]->id."'"); //accedere tramite il nome all'id utente
     return view('search')
     ->  with("s", $sessione)
     ->  with("nomi", $query);
 });

 Route::get('/logout', function () {
    session() -> flush();
    return redirect('login');
});






            