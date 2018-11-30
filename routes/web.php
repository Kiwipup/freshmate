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

use Illuminate\Http\Request;

Route::get('/', function () {
$recipes = DB::table('recipes')->orderBy('title', 'ascending')->get();
return view('welcome', compact('recipes'));
});

Route::any('recipes/search',function(Request $request){
    $q = $request->input( 'q' );
    $recipes = DB::table('recipes')->where('title','LIKE','%'. $q .'%')->orWhere('ingredients','LIKE','%'. $q .'%')->get();

        return view('/recipes/search', compact('recipes', 'q'));

});


Route::get('/pantry/suggestions', function () {
  $inventory = DB::table('inventories')->select('item')->where('user_id', \Auth::id())->get();
  $suggestions = DB::table('recipes')->whereIn('ingredients','LIKE','%'. $inventory .'%')->get();


  return view('/pantry/suggestions', compact('suggestions', 'inventory'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/recipes/suggestions', 'SuggestionsController@suggestions')->middleware('auth');
Route::resource('pantry', 'InventoryController')->middleware('auth');
Route::resource('/restock/index', 'RestockController')->middleware('auth');
Route::resource('/pantry/index', 'InventoryController')->middleware('auth');
Route::resource('restock', 'RestockController')->middleware('auth');
Route::resource('recipes', 'RecipeController')->middleware('auth');
Route::resource('recipes/{recipe}/reviews', 'ReviewController')->middleware('auth');
