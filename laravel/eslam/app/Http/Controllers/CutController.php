<?php

namespace App\Http\Controllers;

use App\Models\Cloth;
use App\Models\Cut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuts = DB::table('cuts')->paginate(10);
        return view('cuts.index')->with('cut', $cuts)->with("dd", "dd");
    }


    public function search(Request $request)
    {
        $request->validate([
            "search" => "required|string",
        ]);
        $cuts = DB::table('cuts')->where('clientName', '=', $request->search)
        ->orWhere('code', '=', $request->search)->orWhere('name', '=', $request->search)->get();
        return view('cuts.index')->with('cut', $cuts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function toCreate()
    {
        $cloth = DB::select('select id,idNum from cloths');
        return view('cuts.toCreate')->with("cloth", $cloth);
    }


    public function create(Request $request)
    {
        $request->validate([
            "idNum" => "required|numeric",
        ]);
        $idNum = $request->idNum;
        $cloth = Cloth::find($idNum);
        return \view('cuts.create')->with("cloth", $cloth);
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
            "code" => 'required|string|unique:cuts,name',
            "name" => 'required|string',
            "count" => 'required|numeric',
            "weight" => 'required|numeric',
            "num" => 'required|numeric',
            "date" => "required|string",
        ]);
        $cut = new Cut();
        $cut->idNum = $request->idNum;
        $cut->clientName = $request->clientName;
        $cut->color = $request->color;
        $cut->type = $request->type;
        $cut->code = $request->code;
        $cut->name = $request->name;
        $cut->count = $request->count;
        $cut->weight = $request->weight;
        $cut->num = $request->num;
        $cut->date = $request->date;
        $cut->save();
        return \redirect()->route('cut.toCreate')->with("done", "done");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cut  $cut
     * @return \Illuminate\Http\Response
     */
    public function show(Cut $cut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cut  $cut
     * @return \Illuminate\Http\Response
     */
    public function edit(Cut $cut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cut  $cut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cut $cut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cut  $cut
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cloth = Cut::find($id);
        $cloth->delete();
        return \redirect()->back()->with('remove', "remove");
    }
}
