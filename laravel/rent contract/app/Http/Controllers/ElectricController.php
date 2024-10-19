<?php

namespace App\Http\Controllers;

use App\Http\Requests\ElectricRequest;
use App\Models\Contract;
use App\Models\Electric;
use Illuminate\Http\Request;

class ElectricController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $electrics = Electric::orderBy('id', 'desc')->get();
        return view('dashboard.electric.index', compact('electrics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contracts = Contract::select('buildingNum','id')->get();
        return view('dashboard.electric.create', compact('contracts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ElectricRequest $request)
    {
        $data = $request->validated();
        if (isset($data['PDF'])) $data['PDF'] = $data['PDF']->store('electric', 'public');
        Electric::create($data);
        return redirect()->route('electric.index')->with('success','تم اضافة الكهرباء بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $electric = Electric::findOrFail($id);
        $contracts = Contract::select('buildingNum','id')->get();
        return view('dashboard.electric.edit', compact('electric','contracts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ElectricRequest $request, $id)
    {
        $electric = Electric::findOrFail($id);
        $data = $request->validated();
        if (isset($data['PDF'])) $data['PDF'] = $data['PDF']->store('electric', 'public');
        $electric->update($data);
        return redirect()->route('electric.index')->with('success','تم تعديل الكهرباء بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $electric = Electric::findOrFail($id);
        $electric->delete();
        return back()->with('success','تم حذف الكهرباء بنجاح');

    }
}
