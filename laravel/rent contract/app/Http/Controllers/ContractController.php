<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractDueRequest;
use App\Http\Requests\ContractElectricRequest;
use App\Http\Requests\ContractRequest;
use App\Http\Requests\ContractWaterRequest;
use App\Models\City;
use App\Models\Contract;
use App\Models\Detail;
use App\Models\Due;
use App\Models\Electric;
use App\Models\Time;
use App\Models\Type;
use App\Models\Water;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::orderBy('id', 'desc')->get();
        return view('dashboard.contract.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $time = Time::all();
        $type = Type::all();
        $city = City::all();
        $detail = Detail::all();
        return view('dashboard.contract.create', compact('time', 'type', 'city', 'detail'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContractRequest $request)
    {
        $data = $request->validated();
        if (isset($data['contractPDF'])) $data['contractPDF'] = $data['contractPDF']->store('contracts', 'public');
        if (isset($data['checkboxPDF'])) $data['checkboxPDF'] = $data['checkboxPDF']->store('contracts', 'public');
        $contract = Contract::create($data);
        return redirect()->route('contracts.create-due', $contract->id)->with('success', 'تم اضافة العقد بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contract = Contract::findOrFail($id);
        return view('dashboard.contract.show', compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contract = Contract::findOrFail($id);
        $time = Time::all();
        $type = Type::all();
        $city = City::all();
        $detail = Detail::all();
        return view('dashboard.contract.edit', compact('contract', 'time', 'type', 'city', 'detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContractRequest $request, $id)
    {
        $contract = Contract::findOrFail($id);
        $data = $request->validated();
        if (isset($data['contractPDF'])) $data['contractPDF'] = $data['contractPDF']->store('contracts', 'public');
        if (isset($data['checkboxPDF'])) $data['checkboxPDF'] = $data['checkboxPDF']->store('contracts', 'public');
        $contract->update($data);
        return redirect()->route('contracts.show', $id)->with('success', 'تم تعديل العقد بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contract = Contract::findOrFail($id);
        $contract->dues()?->delete();
        $contract->waters()?->delete();
        $contract->electrics()?->delete();
        $contract->delete();
        return redirect()->route('contracts.index')->with('success', 'تم حذف العقد بنجاح');
    }

    public function search(Request $request)
    {
        $contractType = $request->contractType;
        $city = $request->city;
        $type = $request->type;
        $done = $request->done;
        $contractsQuery = Contract::query();
        if ($contractType != null) {
            $contractsQuery->where("contractType", $contractType);
        }
        if ($city !== null) {
            $contractsQuery->where("city", $city);
        }
        if ($done == 0) {
            $contractsQuery->where("done", 0);
        }
        if ($done == 1) {
            $contractsQuery->where("done", 1);
        }
        if ($type !== null) {
            $date = Carbon::now()->format('Y-m-d');
            if ($type == 0) {
                $contractsQuery->where('contractEnd', '>', $date);
            } else if ($type == 1) {
                $contractsQuery->where('contractEnd', '<', $date);
            } else {
                $contractsQuery->where('rentEnd', '<', $date);
            }
        }
        $contracts = $contractsQuery->orderBy('id', 'desc')->get();
        return view('dashboard.contract.index', compact('contracts', 'contractType', 'city', 'type', 'done'));
    }

    public function next($id)
    {
        $contract = Contract::orderBy('id', 'desc')->where('id', '<', $id)->first();
        if ($contract) {
            return redirect()->route('contracts.show', $contract->id);
        } else {
            return back()->with('error', 'هذا العقد الاول');
        }
    }

    public function previous($id)
    {
        $contract = Contract::where('id', '>', $id)->first();
        if ($contract) {
            return redirect()->route('contracts.show', $contract->id);
        } else {
            return back()->with('error', 'هذا العقد الاخير');
        }
    }

    public function due(ContractDueRequest $request, $id)
    {
        $contract = Contract::findOrFail($id);
        $data = $request->validated();
        $data['contractNum'] = $contract->id;
        Due::create($data);
        return back()->with('success', 'تم اضافة الاستحقاق بنجاح');
    }

    public function electric(ContractElectricRequest $request, $id)
    {
        $contract = Contract::findOrFail($id);
        $data = $request->validated();
        $data['contractNum'] = $contract->id;
        Electric::create($data);
        return back()->with('success', 'تم اضافة الكهرباء بنجاح');
    }

    public function water(ContractWaterRequest $request, $id)
    {
        $contract = Contract::findOrFail($id);
        $data = $request->validated();
        $data['contractNum'] = $contract->id;
        Water::create($data);
        return back()->with('success', 'تم اضافة المياه بنجاح');
    }

    public function createDue($id)
    {
        return view('dashboard.contract.create-due', compact('id'));
    }
    public function storeDue(Request $request, $id)
    {
        $contract = Contract::findOrFail($id);
        foreach ($request->deu as $due) {
            $due['contractNum'] = $contract->id;
            if (isset($due['duePdf'])) $due['duePdf'] = $due['duePdf']->store('due', 'public');
            Due::create($due);
        }
        return redirect()->route('contracts.show', $id)->with('success', 'تم تعديل الاستحقاقات بنجاح');
    }
}
