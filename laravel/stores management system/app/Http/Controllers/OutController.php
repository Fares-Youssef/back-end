<?php

namespace App\Http\Controllers;

use App\Models\Cabin;
use App\Models\Out;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $store = Store::all();
        $cabin = Cabin::all();
        $product = Product::all();
        $out = DB::table('outview')->paginate(10);
        return view('outs.create', [
            'store' => $store,
            'cabin' => $cabin,
            'product' => $product,
            'out' => $out
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $out = $request->validate([
            'product_id' => 'required|numeric',
            'store_id' => 'required|numeric',
            'cabin_id' => 'required|numeric',
            'value' => 'required|numeric',
            'date' => 'required|string',
            'attach' => 'required',
        ]);
        $ins = DB::table('ins')->where('product_id', $request->product_id)
            ->where('store_id', $request->store_id)->where('cabin_id', $request->cabin_id)->sum('value');
        $outs = DB::table('outs')->where('product_id', $request->product_id)
            ->where('store_id', $request->store_id)->where('cabin_id', $request->cabin_id)->sum('value');
        $sum = $ins - $outs;
        if ($request->value > $sum) {
            $message = "الكمية المتاحة : $sum";
            return back()->with('message', $message);
        } else {
            Out::create($out);
            return back()->with('done', 'done');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $out = Out::find($id);
        return view('outs.edit', ['out' => $out]);
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
        $out = Out::find($id);
        $ins = DB::table('ins')->where('product_id', $out->product_id)
            ->where('store_id', $out->store_id)->where('cabin_id', $out->cabin_id)->sum('value');
        $outs = DB::table('outs')->where('product_id', $out->product_id)
            ->where('store_id', $out->store_id)->where('cabin_id', $out->cabin_id)->sum('value');
        $sum = $ins - $outs;
        if ($request->value > $sum) {
            $message = "الكمية المتاحة للزيادة : $sum";
            return back()->with('message', $message);
        } else {
            $out->value = $request->value;
            $out->date = $request->date;
            $out->save();
            return \redirect()->route('out.create')->with('done', 'done');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $out = Out::find($id);
        $out->delete();
        return \back()->with('done', 'done');
    }
}
