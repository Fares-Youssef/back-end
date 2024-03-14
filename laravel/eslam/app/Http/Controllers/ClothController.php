<?php

namespace App\Http\Controllers;

use App\Models\Cloth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClothController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cloth = DB::table('cloths')->paginate(10);
        return \view('cloths.index')->with('cloth', $cloth)->with("dd","dd");
    }


    public function search(Request $request)
    {
        $request->validate([
            "search" => "required|string",
        ]);
        $cloth = DB::table('cloths')->where("clientName",'=',$request->search)->get();
        return \view('cloths.index')->with('cloth', $cloth);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = DB::table('clients')->get();
        return view('cloths.create')->with("client", $client);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "idNum" => "required|numeric|unique:cloths",
            "clientName" => "required|string",
            "color" => "required|string",
            "weight" => "required|numeric",
            "type" => "required|string",
            "date" => "required|string",
        ]);
        $cloth = new Cloth();
        $cloth->idNum = $request->idNum;
        $cloth->clientName = $request->clientName;
        $cloth->color = $request->color;
        $cloth->weight = $request->weight;
        $cloth->type = $request->type;
        $cloth->date = $request->date;
        $cloth->save();
        return \redirect()->back()->with("done", "done");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cloth  $cloth
     * @return \Illuminate\Http\Response
     */
    public function toShow()
    {
        $cloth = DB::select('select id,idNum from cloths');
        return view('cloths.toShow')->with("cloth", $cloth);
    }

    public function show(Request $request)
    {
        $request->validate([
            "idNum" => "required"
        ]);
        $cloth = Cloth::find($request->idNum);
        $idNum = $cloth->idNum;
        $cut = DB::table('cuts')->where("idNum",'=',$idNum)->get();
        return view('cloths.show')->with('cloth',$cloth)->with('cut',$cut);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cloth  $cloth
     * @return \Illuminate\Http\Response
     */
    public function edit(Cloth $cloth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cloth  $cloth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cloth $cloth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cloth  $cloth
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cloth = Cloth::find($id);
        $cloth->delete();
        return \redirect()->back()->with('remove', "remove");
    }
}
