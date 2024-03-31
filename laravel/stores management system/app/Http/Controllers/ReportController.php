<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function products()
    {
        $product = DB::table('productsreport')->paginate(10);
        $products = DB::table('productsreport')->get();
        return view('reports.products', [
            'product' => $product,
            'products' => $products
        ]);
    }

    public function productsSearch(Request $request)
    {
        $request->validate([
            'search' => 'required|string'
        ]);
        $search = $request->search;
        $product = DB::table('productsreport')
            ->where('name', 'LIKE', '%' . $search . '%')
            ->paginate(10);
        $products = DB::select("SELECT * FROM productsreport WHERE name LIKE ?", ['%' . $search . '%']);
        return view('reports.products', [
            'product' => $product,
            'products' => $products
        ]);
    }

    public function cabins()
    {
        $cabin = DB::table('cabinreport')->paginate(10);
        $cabins = DB::table('cabinreport')->get();
        return view('reports.cabin', [
            'cabin' => $cabin,
            'cabins' => $cabins
        ]);
    }

    public function cabinsSearch(Request $request)
    {
        $request->validate([
            'search' => 'required|string'
        ]);
        $search = $request->search;
        $cabin = DB::table('cabinreport')
            ->where('product_name', 'LIKE', '%' . $search . '%')
            ->paginate(10);
        $cabins = DB::select("SELECT * FROM cabinreport WHERE product_name LIKE ?", ['%' . $search . '%']);
        return view('reports.cabin', [
            'cabin' => $cabin,
            'cabins' => $cabins
        ]);
    }

    public function toIn()
    {
        $product = Product::all();
        return view('reports.toIn', ['product' => $product]);
    }

    public function in(Request $request)
    {
        $query = DB::table('insview');

        if ($request->product != null) {
            $query->where('product_id', $request->product);
        }

        if ($request->from != null) {
            $query->whereBetween('date', [$request->from, $request->to]);
        }

        $in = $query->paginate(10);
        $ins = $query->get();

        return view('reports.in', [
            'in' => $in,
            'ins' => $ins
        ]);
    }

    public function toOut()
    {
        $product = Product::all();
        return view('reports.toOut', ['product' => $product]);
    }

    public function out(Request $request)
    {
        $query = DB::table('outview');

        if ($request->product != null) {
            $query->where('product_id', $request->product);
        }

        if ($request->from != null) {
            $query->whereBetween('date', [$request->from, $request->to]);
        }

        $out = $query->paginate(10);
        $outs = $query->get();

        return view('reports.out', [
            'out' => $out,
            'outs' => $outs
        ]);
    }
}
