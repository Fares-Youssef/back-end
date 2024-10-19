<?php

namespace App\Http\Controllers;

use App\Http\Requests\DueRequest;
use App\Models\Contract;
use App\Models\Due;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dues = Due::orderBy('id', 'desc')->get();
        return view('dashboard.due.index', compact('dues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contracts = Contract::select('buildingNum','id')->get();
        return view('dashboard.due.create', compact('contracts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DueRequest $request)
    {
        $data = $request->validated();
        if (isset($data['duePdf'])) $data['duePdf'] = $data['duePdf']->store('due', 'public');
        $data['pay'] = $data['pay'] ?? 0;
        Due::create($data);
        return redirect()->route('due.index')->with('success', 'تم اضافة الاستحقاق بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $due = Due::findOrFail($id);
        $contracts = Contract::select('buildingNum','id')->get();
        return view('dashboard.due.edit', compact('due', 'contracts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DueRequest $request, $id)
    {
        $due = Due::findOrFail($id);
        $data = $request->validated();
        if (isset($data['duePdf'])) $data['duePdf'] = $data['duePdf']->store('due', 'public');
        $data['pay'] = $data['pay'] ?? 0;
        $due->update($data);
        return redirect()->route('due.index')->with('success', 'تم تعديل الاستحقاق بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $due = Due::findOrFail($id);
        $due->delete();
        return back()->with('success', 'تم حذف الاستحقاق بنجاح');
    }

    public function search(Request $request)
    {
        $contractType = $request->contractType;
        $city = $request->city;
        $pay = $request->pay;
        $date = $request->date;
        $dateRange = explode(' - ', $date);
        $today = Carbon::today()->format('Y-m-d');
        $query = Due::query();
        if ($contractType) {
            $query->whereHas('contract', function ($q) use ($contractType) {
                $q->where('contractType', $contractType);
            });
        }
        if ($city) {
            $query->whereHas('contract', function ($q) use ($city) {
                $q->where("city", $city);
            });
        }
        if ($pay) {
             if ($pay == 1) {
                $query->whereColumn("pay", "dueInstallment")->get();
            } else {
                $query->whereColumn("pay", "!=", "dueInstallment")->get();
            }
        }

        if ($dateRange[0] != $today && $dateRange[1] != $today) {
            $query->whereBetween('dueDate', [$dateRange[0], $dateRange[1]]);
        }
        $dues = $query->orderBy('id', 'desc')->get();
        return view('dashboard.due.index', compact('dues', 'contractType', 'city', 'pay', 'dateRange'));
    }
}
