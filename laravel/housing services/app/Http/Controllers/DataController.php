<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Date;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function import(Request $request)
    {
        $id = \auth()->user()->type;
        if ($id != "مدير موقع") {
            return \redirect()->route('home');
        } else {
            DB::delete("delete from data");
            $request->validate([
                "file" => "required|file|mimes:xlsx|max:3072",
            ]);
            Excel::import(new DataImport, $request->file);
            return \redirect()->back()->with("done", "donee");
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importView()
    {
        $date = Date::find(1);
        $id = \auth()->user()->type;
        if ($id != "مدير موقع") {
            return \redirect()->route('home');
        } else {
            $city = DB::table('cities')->paginate(10);
            $location = DB::table('locations')->paginate(10);
            return \view('data.import')->with("date", $date)->with("location", $location)->with("city", $city);
        }
    }


    public function index()
    {
        $data = DB::table("data")->paginate(9);
        return \view('data.index')->with('data', $data);
    }

    public function search(Request $request)
    {
        $request->validate([
            "search" => "required",
        ]);
        $num = $request->search;
        $data = DB::table("data")->where("num", "=", $num)->paginate(9);
        return \view('data.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('data.create');
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
            "num" => "required|numeric",
            "name" => "required",
            "idNum" => "required",
            "nationality" => "required",
            "city" => "required",
            "location" => "required"
        ]);
        $drive = new Data();
        $drive->num = $request->num;
        $drive->name = $request->name;
        $drive->job = $request->job;
        $drive->idNum = $request->idNum;
        $drive->city = $request->city;
        $drive->location = $request->location;
        $drive->nationality = $request->nationality;
        $drive->status = $request->status;
        $drive->save();
        return \redirect()->back()->with("done", "done");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Data::find($id);
        return \view('data.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "num" => "required|numeric",
            "name" => "required",
            "idNum" => "required",
            "nationality" => "required",
            "city" => "required",
            "location" => "required"
        ]);
        $drive = Data::find($id);
        $drive->num = $request->num;
        $drive->name = $request->name;
        $drive->job = $request->job;
        $drive->idNum = $request->idNum;
        $drive->city = $request->city;
        $drive->location = $request->location;
        $drive->nationality = $request->nationality;
        $drive->status = $request->status;
        $drive->save();
        return \redirect()->route('data.index')->with("done", "done");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Data::find($id);
        $data->delete();
        return \redirect()->route('data.index')->with('del', "del");
    }

}
