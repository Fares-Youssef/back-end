<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $store = Store::all();
        return view('stores.create')->with('store', $store);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $store = $request->validate(['name' => 'required|string']);
        Store::create($store);
        return back()->with('done', 'done');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $store = Store::find($id);
        return view('stores.edit')->with('store', $store);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string']);
        $store = Store::find($id);
        $store->name = $request->name;
        $store->save();
        return \redirect()->route('store.create')->with('done', 'done');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $store = Store::find($id);
        if ($store->cabin()->exists()) {
            return back()->with('remove', 'remove');
        } else {
            $store->delete();
            return back()->with('done', 'done');
        }
    }
}
