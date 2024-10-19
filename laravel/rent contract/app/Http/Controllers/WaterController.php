<?php

namespace App\Http\Controllers;

use App\Http\Requests\WaterRequest;
use App\Models\Contract;
use App\Models\Water;
use Illuminate\Http\Request;

class WaterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $waters = Water::orderBy('id', 'desc')->get();
        return view('dashboard.water.index', compact('waters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contracts = Contract::select('buildingNum','id')->get();
        return view('dashboard.water.create', compact('contracts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WaterRequest $request)
    {
        $data = $request->validated();
        if (isset($data['PDF'])) $data['PDF'] = $data['PDF']->store('waters', 'public');
        Water::create($data);
        return redirect()->route('waters.index')->with('success','تم اضافة المياه بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $water = Water::findOrFail($id);
        $contracts = Contract::select('buildingNum','id')->get();
        return view('dashboard.water.edit', compact('water','contracts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WaterRequest $request, $id)
    {
        $water = Water::findOrFail($id);
        $data = $request->validated();
        if (isset($data['PDF'])) $data['PDF'] = $data['PDF']->store('waters', 'public');
        $water->update($data);
        return redirect()->route('waters.index')->with('success','تم تحديث المياه بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $water = Water::findOrFail($id);
        $water->delete();
        return back()->with('success','تم حذف المياه بنجاح');
    }
}
