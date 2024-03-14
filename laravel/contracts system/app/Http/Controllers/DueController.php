<?php

namespace App\Http\Controllers;

use App\Models\Due;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\DuesExport;
use Maatwebsite\Excel\Facades\Excel;

class DueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dues = DB::table("duesjoincontracts")->paginate(7);
        $time = DB::table("details")->get();
        $cities = DB::table("cities")->get();
        return \view("dues.index")->with('dues', $dues)->with("fares", 1)->with("cities", $cities)->with("time", $time);
    }

    public function search(Request $request)
    {
        $buildingNum = $request->buildingNum;
        $contractType = $request->contractType;
        $city = $request->city;
        $from = $request->from;
        $to = $request->to;
        $pay = $request->pay;
        if ($contractType == null && $city == null && $pay == null && $from == null) {
            $dues = DB::table("duesjoincontracts")->get();
        }
        if ($contractType != null && $city == null && $pay == null && $from == null) {
            $dues = DB::table("duesjoincontracts")->where("contractType", "=", $contractType)->get();
        }
        if ($contractType == null && $city != null && $pay == null && $from == null) {
            $dues = DB::table("duesjoincontracts")->where("city", "=", $city)->get();
        }
        if ($contractType == null && $city == null && $pay != null && $from == null) {
            if ($pay == 1) {
                $dues = DB::table("duesjoincontracts")->where("pay", "!=", null)->get();
            } else {
                $dues = DB::table("duesjoincontracts")->where("pay", "=", null)->get();
            }
        }
        if ($contractType == null && $city == null && $pay == null && $from != null) {
            if ($to == null) {
                $dues = DB::table("duesjoincontracts")->whereBetween("dueDate", [$from, $from])->get();
            } else {
                $dues = DB::table("duesjoincontracts")->whereBetween("dueDate", [$from, $to])->get();
            }
        }
        if ($contractType != null && $city != null && $pay == null && $from == null) {
            $dues = DB::table("duesjoincontracts")->where("city", "=", $city)->where("contractType", "=", $contractType)->get();
        }
        if ($contractType != null && $city == null && $pay != null && $from == null) {
            if ($pay == 1) {
                $dues = DB::table("duesjoincontracts")->where("pay", "!=", null)->where("contractType", "=", $contractType)->get();
            } else {
                $dues = DB::table("duesjoincontracts")->where("pay", "=", null)->where("contractType", "=", $contractType)->get();
            }
        }
        if ($contractType != null && $city == null && $pay == null && $from != null) {
            if ($to == null) {
                $dues = DB::table("duesjoincontracts")->whereBetween("dueDate", [$from, $from])->where("contractType", "=", $contractType)->get();
            } else {
                $dues = DB::table("duesjoincontracts")->whereBetween("dueDate", [$from, $to])->where("contractType", "=", $contractType)->get();
            }
        }
        if ($contractType == null && $city != null && $pay != null && $from == null) {
            if ($pay == 1) {
                $dues = DB::table("duesjoincontracts")->where("pay", "!=", null)->where("city", "=", $city)->get();
            } else {
                $dues = DB::table("duesjoincontracts")->where("pay", "=", null)->where("city", "=", $city)->get();
            }
        }
        if ($contractType == null && $city != null && $pay == null && $from != null) {
            if ($to == null) {
                $dues = DB::table("duesjoincontracts")->whereBetween("dueDate", [$from, $from])->where("city", "=", $city)->get();
            } else {
                $dues = DB::table("duesjoincontracts")->whereBetween("dueDate", [$from, $to])->where("city", "=", $city)->get();
            }
        }
        if ($contractType == null && $city == null && $pay != null && $from != null) {
            if ($pay == 1) {
                if ($to == null) {
                    $dues = DB::table("duesjoincontracts")->whereBetween("dueDate", [$from, $from])->where("pay", "!=", null)->get();
                } else {
                    $dues = DB::table("duesjoincontracts")->whereBetween("dueDate", [$from, $to])->where("pay", "!=", null)->get();
                }
            } else {
                if ($to == null) {
                    $dues = DB::table("duesjoincontracts")->whereBetween("dueDate", [$from, $from])->where("pay", "=", null)->get();
                } else {
                    $dues = DB::table("duesjoincontracts")->whereBetween("dueDate", [$from, $to])->where("pay", "=", null)->get();
                }
            }
        }
        if ($contractType != null && $city != null && $pay != null && $from != null) {
            if ($pay == 1) {
                if ($to == null) {
                    $dues = DB::table("duesjoincontracts")->where("city", "=", $city)->where("contractType", "=", $contractType)->whereBetween("dueDate", [$from, $from])->where("pay", "!=", null)->get();
                } else {
                    $dues = DB::table("duesjoincontracts")->where("city", "=", $city)->where("contractType", "=", $contractType)->whereBetween("dueDate", [$from, $to])->where("pay", "!=", null)->get();
                }
            } else {
                if ($to == null) {
                    $dues = DB::table("duesjoincontracts")->where("city", "=", $city)->where("contractType", "=", $contractType)->whereBetween("dueDate", [$from, $from])->where("pay", "=", null)->get();
                } else {
                    $dues = DB::table("duesjoincontracts")->where("city", "=", $city)->where("contractType", "=", $contractType)->whereBetween("dueDate", [$from, $to])->where("pay", "=", null)->get();
                }
            }
        }
        $time = DB::table("details")->get();
        $cities = DB::table("cities")->get();
        return \view('dues.index')->with("dues", $dues)->with("time", $time)->with("cities", $cities)->with("cities", $cities)->with("fares", 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $contracts = DB::table("contracts")->get();
        return \view("dues.create")->with('contracts', $contracts);
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
            'contractNum' => "required|string|min:2|max:50",
            'dueDate' => "required|string|min:2|max:50",
            'dueInstallment' => "required|string|min:2|max:50"
        ]);
        $drive = new Due();
        $drive->contractNum = $request->contractNum;
        $drive->dueDate = $request->dueDate;
        $drive->dueInstallment = $request->dueInstallment;
        $drive->pay = $request->pay;
        $drive->dueData = $request->dueData;
        $drive->duePdf = $request->duePdf;
        $drive->save();
        return redirect()->back()->with("done", "uploaded file done");
    }
    public function newStore(Request $request)
    {
        $json = \json_decode($request->data, \true);
        DB::table('dues')->insert($json);
        return redirect()->route('contract.create')->with("done", "uploaded file done");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Due  $due
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dues = Due::find($id);
        return \view("dues.show")->with('dues', $dues);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Due  $due
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $due = Due::find($id);
        return \view("dues.edit")->with("due", $due);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Due  $due
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $due = Due::find($id);
        $due->contractNum = $request->contractNum;
        $due->dueDate = $request->dueDate;
        $due->dueInstallment = $request->dueInstallment;
        $due->pay = $request->pay;
        $due->dueData = $request->dueData;
        /////////
        if ($request->file != null && $due->duePdf == null) {
            $due_data = $request->file("file");
            $due_name = \time() . $due_data->getClientOriginalName();
            $location =  \public_path('./PDF folder/');
            $due_data->move($location, $due_name);
            $due->duePdf = $due_name;
        } elseif ($request->file != null && $due->duePdf != null) {
            $path = \public_path() . "/PDF folder/" . $due->duePdf;
            \unlink($path);
            $due_data = $request->file("file");
            $due_name = \time() . $due_data->getClientOriginalName();
            $location =  \public_path('./PDF folder/');
            $due_data->move($location, $due_name);
            $due->duePdf = $due_name;
        }
        $due->save();
        return redirect()->route('due.index')->with("done", "uploaded file done");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Due  $due
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drive = Due::find($id);
        if ($drive->duePdf != null) {
            $drive_name = $drive->duePdf;
            $path = \public_path() . "/PDF folder/" . $drive_name;
            \unlink($path);
        }
        $drive->delete();
        return redirect()->route('due.index')->with("remove", "remove file done");
    }

    public function download($id)
    {
        $drive = Due::find($id);
        $drive_name = $drive->duePdf;
        $path = \public_path() . "/PDF folder/" . $drive_name;
        return \response()->download($path);
    }


    public function export()
    {
        return Excel::download(new DuesExport, 'dues.xlsx');
    }
}
