<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Contract;
use App\Models\Detail;
use App\Models\Due;
use App\Models\Electric;
use App\Models\Time;
use App\Models\Type;
use App\Models\Water;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.home');
    }

    public function test()
    {
        try {
            DB::beginTransaction();
            $dues = Due::all();
            foreach ($dues as $due) {
                $due->update([
                    'contractNum' => $due->contract->id
                ]);
            }
            $waters = Water::all();
            foreach ($waters as $water) {
                $water->update([
                    'contractNum' => $water->contract->id
                ]);
            }
            $electrics = Electric::all();
            foreach ($electrics as $electric) {
                $electric->update([
                    'contractNum' => $electric->contract->id
                ]);
            }
            $contracts = Contract::all();
            foreach ($contracts as $contract) {
                $contract->update([
                    'city' => City::where('name', $contract->city)->first()->id ?? null,
                    'buildingType' => Type::where('name', $contract->buildingType)->first()->id ?? null,
                    'contractType' => Detail::where('name', $contract->contractType)->first()->id,
                    'contractDetails' => Time::where('name', $contract->contractDetails)->first()->id,
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
