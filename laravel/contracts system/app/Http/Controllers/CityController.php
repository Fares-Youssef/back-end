<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = DB::table("cities")->get();
        return view("setting.city")->with('cities',$cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $drive = new City();
        $drive->name = $request->name;
        $drive->save();
        return redirect()->back()->with("done", "uploaded file done");
        // $fileSiza = 1024 * 2;
        // $request->validate([
        //     'name' => "required|string|min:2|max:20",
        //     'title' => "required|string|min:4|max:50",
        //     'file' => "required|mimes:png,jpg,pdf|max:$fileSiza"
        // ]);
        // $drive = new Drive();
        // $drive->name = $request->name;
        // $drive->title = $request->title;
        // $drive->userId = \auth()->user()->id;
        // // upload file code
        // $drive_data = $request->file("file");
        // $drive_name = \time() . $drive_data->getClientOriginalName();
        // $location =  \public_path('./drives/');
        // $drive_data->move($location, $drive_name);
        // $drive->file = $drive_name;
        // $drive->save();
        // return redirect()->back()->with("done", "uploaded file done");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drive = City::find($id);
        $drive->delete();
        return redirect()->route('setting.city')->with("remove", "remove file done");
    }
}
