<?php

namespace App\Http\Controllers;

use App\Models\In;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table("ins")->get();
        return \view('employees.totalIn')->with("product", $product);
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
        $request ->validate([
            "empId" => "required|unique:products,name|string|max:50",
            "time" => "required|string|max:50",
            "date" => "required|string|max:50",
        ]);
        $drive = new in();
        $drive->empId = $request->empId;
        $drive->time = $request->time;
        $drive->date = $request->date;
        $drive->save();
        return redirect()->back()->with("done", "done");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\In  $in
     * @return \Illuminate\Http\Response
     */
    public function show(In $in)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\In  $in
     * @return \Illuminate\Http\Response
     */
    public function edit(In $in)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\In  $in
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, In $in)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\In  $in
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drive = in::find($id);
        $drive->delete();
        return redirect()->back()->with("done", "done");
    }
}
