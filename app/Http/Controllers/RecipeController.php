<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('recipes.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('recipes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validatedData = $request->validate([
            'image' => 'required|max:250|url',
            'description' => 'required|max:500',
        ]);

      $recipes = new \App\Recipe;
      $recipes->user_id = \Auth::id();
      $recipes->title = $request->input('title');
      $recipes->author = \Auth::user()->username;
      $recipes->prep_time = $request->input('prep_time');
      $recipes->cook_time = $request->input('cook_time');
      $recipes->image = $request->input('image');
      $recipes->description = $request->input('description');
      $recipes->ingredients = $request->input('ingredients');
      $recipes->instructions = $request->input('instructions');
      $recipes->save();

      // messaging
        $request->session()->flash('status', 'Your recipe was added successfully!');

        // redirect
        return redirect()->route('recipes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
