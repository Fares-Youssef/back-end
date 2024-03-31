<?php

namespace App\Http\Controllers;

use App\Models\Cabin;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CabinController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $store = Store::all();
        $cabin = DB::table('cabinView')->paginate(10);
        return view('cabins.create',[
            'store' => $store,
            'cabin' => $cabin
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cabin = $request->validate([
            'store_id' => 'required|numeric',
            'name' => 'required|string'
        ]);
        Cabin::create($cabin);
        return back()->with('done','done');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cabin = Cabin::find($id);
        $stores = Store::all();
        $store = Store::find($cabin->store_id);
        return view('cabins.edit',[
            'store' => $store,
            'stores' => $stores,
            'cabin' => $cabin
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'store_id' => 'required|numeric',
            'name' => 'required|string'
        ]);
        $cabin = Cabin::find($id);
        $cabin->store_id = $request->store_id;
        $cabin->name = $request->name;
        $cabin->save();
        return redirect()->route('cabin.create',['done' => 'done']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cabin = Cabin::find($id);
        $cabin->delete();
        return back()->with('done','done');
    }
}
