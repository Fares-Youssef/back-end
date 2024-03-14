<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use Illuminate\Support\Facades\DB;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $id = \auth()->user()->name;
        if ($id == "fares youssef") {
            $receipt = DB::table("receipts")->paginate(20);
        } else {
            $receipt = DB::table("receipts")->where("userName", "=", $id)->paginate(20);
        }
        return \view('receipts.index')->with("receipt", $receipt)->with('done','done');
    }

    public function search(Request $request){
        $id = $request->search;
        $userName = \auth()->user()->name;
        // $receipt = Receipt::find($userName)->get();
        $receipt = DB::table("receipts")->where("id", "=", $id)->where("userName", '=', $userName)->paginate(1);
        return \view('receipts.index')->with("receipt", $receipt);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = DB::table('clients')->get();
        $id = \auth()->user()->name;
        if ($id == "fares youssef") {
            $product = DB::table("products")->get();
            $employee = DB::table("employeesAllData")->get();
        } else {
            $product = DB::table("products")->where("userName", "=", $id)->get();
            $employee = DB::table("employeesAllData")->where("userName", "=", $id)->get();
        }
        $date = date('Y-m-d');
        return view('receipts.create')->with("client", $client)->with("product", $product)->with("employee", $employee)->with("date", $date);
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
            "clientName" => "required|string",
            "empName" => "required|string",
            "date" => "required|string",
            "product" => "required|string",
            "total" => "required|string",
            "paid" => "required|string",
            "totalTotal" => "required|string",
        ]);
        $userName = \auth()->user()->name;
        $drive = new Receipt();
        $drive->userName = $userName;
        $drive->clientName = $request->clientName;
        $drive->empName = $request->empName;
        $drive->date = $request->date;
        $drive->product = $request->product;
        $drive->total = $request->total;
        $drive->paid = $request->paid;
        $drive->totalTotal = $request->totalTotal;
        $drive->save();
        $id = $drive->id;
        $clientName = $request->clientName;
        $empName = $request->empName;
        $date = $request->date;
        $product = $request->product;
        $total = $request->total;
        $paid = $request->paid;
        $totalTotal = $request->totalTotal;
        return view('print')->with("clientName", $clientName)
        ->with("userName", $userName)
        ->with("id", $id)
        ->with("empName", $empName)
        ->with("date", $date)
        ->with("product", $product)
        ->with("total", $total)
        ->with("paid", $paid)
        ->with("totalTotal", $totalTotal);
    }

    public function print(){
        $receipt = DB::table("receipts")->latest();
        return \view('print2')->with("receipt" , $receipt);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt $receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drive = Receipt::find($id);
        $drive->delete();
        return redirect()->back()->with("done", "done");
    }
}
