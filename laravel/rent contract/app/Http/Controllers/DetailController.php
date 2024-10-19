<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = Detail::all();
        return view('dashboard.detail.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.detail.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Detail::create($data);
        return redirect()->route('details.index')->with('success', 'تم اضافة نوع عقد جديد بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $detail = Detail::findOrFail($id);
        return view('dashboard.detail.edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $detail = Detail::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $detail->update($data);
        return redirect()->route('details.index')->with('success', 'تم تعديل نوع العقد بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $detail = Detail::findOrFail($id);
        $detail->delete();
        return redirect()->route('details.index')->with('success', 'تم حذف نوع العقد بنجاح');
    }
}
