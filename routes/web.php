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
Route::get('/pantry/suggestions', function () {
  $recipes = DB::table('recipes')->orderBy('updated_at', 'desc')->get();
  $items = DB::table('inventories')->select('item')->get();
  return view('/pantry/suggestions', compact('recipes', 'items'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/recipes/suggestions', 'SuggestionsController@suggestions')->middleware('auth');

Route::resource('pantry', 'InventoryController')->middleware('auth');
Route::resource('restock', 'RestockController')->middleware('auth');
Route::resource('recipes', 'RecipeController')->middleware('auth');
