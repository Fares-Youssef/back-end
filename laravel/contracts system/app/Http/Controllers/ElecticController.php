<?php

namespace App\Http\Controllers;

use App\Models\Electic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElecticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waters = DB::table("electricjoincontract")->paginate(7);
        $contracts = DB::table("contracts")->get();
        return \view('electric.index')->with('waters', $waters)->with("fares", 1)->with("contracts", $contracts);
    }


    public function search(Request $request)
    {
        $contractNum = $request->contractNum;
        $contractName = $request->contractName;
        if ($contractNum == null && $contractName == null) {
            $waters = DB::table("electricjoincontract")->get();
        }
        if ($contractNum != null && $contractName == null) {
            $waters = DB::table("electricjoincontract")->where("contractNum", "=", $contractNum)->get();
        }
        if ($contractNum == null && $contractName != null) {
            $waters = DB::table("electricjoincontract")->where("buildingName", "=", $contractName)->get();
        }
        if ($contractNum != null && $contractName != null) {
            $waters = DB::table("electricjoincontract")->where("contractNum", "=", $contractNum)->where("buildingName", "=", $contractName)->get();
        }
        $contracts = DB::table("contracts")->get();
        return \view('electric.index')->with('waters', $waters)->with("contracts", $contracts)->with("fares", 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contracts = DB::table("contracts")->get();
        return \view('electric.create')->with('contracts', $contracts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $drive = new Electic();
        $drive->contractNum= $request->contractNum	;
        $drive->start = $request->start;
        $drive->end = $request->end;
        $drive->value = $request->value;
        $drive->PDF = $request->PDF;
        if ($request->file("PDF") != null) {
            $drive_data = $request->file("PDF");
            $drive_name = \time() . $drive_data->getClientOriginalName();
            $location =  \public_path('./PDF folder/');
            $drive_data->move($location, $drive_name);
            $drive->PDF = $drive_name;
        }
        $drive->save();
        return redirect()->back()->with("done", "uploaded file done");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Electic  $electic
     * @return \Illuminate\Http\Response
     */
    public function show(Electic $electic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Electic  $electic
     * @return \Illuminate\Http\Response
     */
    public function edit(Electic $electic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Electic  $electic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Electic $electic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Electic  $electic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drive = Electic::find($id);
        if ($drive->PDF != null) {
            $drive_name = $drive->PDF;
            $path = \public_path() . "/PDF folder/" . $drive_name;
            \unlink($path);
        }
        $drive->delete();
        return redirect()->back()->with("remove", "remove file done");
    }

    public function download($id)
    {
        $drive = Electic::find($id);
        $drive_name = $drive->PDF;
        $path = \public_path() . "/PDF folder/" . $drive_name;
        return \response()->download($path);
    }
}
