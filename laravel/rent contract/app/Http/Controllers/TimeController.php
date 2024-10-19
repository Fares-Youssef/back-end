<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $times = Time::all();
        return view('dashboard.time.index', compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.time.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Time::create($data);
        return redirect()->route('time.index')->with('success', 'تم اضافة تفاصيل عقد جديدة نجاح');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $time = Time::findOrFail($id);
        return view('dashboard.time.edit', compact('time'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $time = Time::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $time->update($data);
        return redirect()->route('time.index')->with('success', 'تم تعديل تفاصيل العقد نجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $time = Time::findOrFail($id);
        $time->delete();
        return redirect()->route('time.index')->with('success', 'تم تعديل تفاصيل العقد نجاح');
    }
}
