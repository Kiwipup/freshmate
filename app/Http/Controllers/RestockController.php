<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('restock.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $restock_items = new \App\Restock;
      $restock_items->user_id = \Auth::id();
      $restock_items->item_name = $request->input('item_name');
      $restock_items->description = $request->input('item_description');
      $restock_items->amount = $request->input('quantity');
      $restock_items->save();

      // messaging
        $request->session()->flash('status', 'Added New Item to Restock list');

        // redirect
        return redirect()->route('restock.index');
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
    public function destroy(Request $request, $id)
    {
      $restock = \App\Restock::find($id);
      // Delete the inventory item
        $restock->delete();

        // messaging
        $request->session()->flash('status', 'Item removed from Inventory!');

        // redirect
        return redirect()->route('restock.index');
    }
}
