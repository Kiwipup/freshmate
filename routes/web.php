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
$recipes = DB::table('recipes')->orderBy('title', 'ascending')->get();
return view('welcome', compact('recipes'));
});

Route::get('/pantry/suggestions', function () {
  $recipes = DB::table('recipes')->orderBy('updated_at', 'desc')->get();
  $ingredients = DB::table('recipes')->select('ingredients')->get();
  $ingredients->toArray();
  $items = DB::table('inventories')->select('item')->where('user_id', \Auth::id())->get()->all();
  return view('/pantry/suggestions', compact('recipes', 'ingredients', 'items'));
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
