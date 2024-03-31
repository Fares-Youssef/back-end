<?php

namespace App\Http\Controllers;

use App\Models\Cabin;
use App\Models\In;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $store = Store::all();
        $cabin = Cabin::all();
        $product = Product::all();
        $in = DB::table('insview')->paginate(10);
        return view('ins.create', [
            'store' => $store,
            'cabin' => $cabin,
            'product' => $product,
            'in' => $in
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ins = $request->validate([
            'product_id' => 'required|numeric',
            'store_id' => 'required|numeric',
            'cabin_id' => 'required|numeric',
            'value' => 'required|numeric',
            'date' => 'required|string',
        ]);
        In::create($ins);
        return back()->with('done', 'done');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $in = In::find($id);
        return view('ins.edit', ['in' => $in]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'value' => 'required|numeric',
            'date' => 'required|string'
        ]);
        $in = In::find($id);
        $ins = DB::table('ins')->where('product_id', $in->product_id)
            ->where('store_id', $in->store_id)->where('cabin_id', $in->cabin_id)->sum('value');
        $outs = DB::table('outs')->where('product_id', $in->product_id)
            ->where('store_id', $in->store_id)->where('cabin_id', $in->cabin_id)->sum('value');
        $sum = $ins + ($request->value - $in->value);
        if ($outs > $sum) {
            $message = "لقد حدث خطأ حسابي";
            return back()->with('message', $message);
        } else {
            $in->value = $request->value;
            $in->date = $request->date;
            $in->save();
            return \redirect()->route('in.create')->with('done', 'done');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $in = In::find($id);
        $in->delete();
        return \back()->with('done', 'done');
    }
}
