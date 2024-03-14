<?php

namespace App\Http\Controllers;

use App\Models\Give;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiveController extends Controller
{
    public function index()
    {
        $give = DB::table('receipts')->paginate(10);
        return \view('gives.index')->with('give', $give)->with('dd','dd');
    }


    public function search(Request $request)
    {
        $request->validate([
            "search" => "required|string",
        ]);
        $give = DB::table('receipts')->where('clientName','=',$request->search)->get();
        return \view('gives.index')->with('give', $give);
    }



    public function toCreate()
    {
        $client = DB::select('select name from clients');
        return \view('gives.toCreate')->with('client', $client);
    }


    public function create(Request $request)
    {
        $request->validate([
            "name" => "required|string"
        ]);
        $cut = DB::select("select code from cuts where clientName LIKE '%$request->name%'");
        return view('gives.create')->with('cut', $cut)->with("client", $request->name);
    }



    public function store(Request $request)
    {
        $json = \json_decode($request->data, \true);
        DB::table('gives')->insert($json);
        $receipt = new Receipt();
        $receipt->clientName = $request->clientName;
        $receipt->date = $request->date;
        $receipt->data = $request->data;
        $receipt->total = $request->total;
        $receipt->save();
        return \redirect()->route('give.toCreate')->with("done", "done");
    }



    public function show($id)
    {
        $give = Receipt::find($id);
        return \view('gives.show')->with("give", $give);
    }


    public function delete(Request $request)
    {
        $json = \json_decode($request->data, \true);
        $count = count($json);
        for ($i = 0; $i < $count; $i++) {
            $removeId = $json[$i]['removeId'];
            $give = DB::table('gives')->where('removeId', '=', $removeId)->get();
            foreach ($give as $item) {
                $giveId = $item->id;
                $cloth = Give::find($giveId);
                $cloth->delete();
            }
        }
        $receipt = Receipt::find($request->id);
        $receipt->delete();
        return \redirect()->route('give.index')->with("remove","remove");
    }
}
