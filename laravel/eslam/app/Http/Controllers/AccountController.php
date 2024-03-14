<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = DB::select('select name from clients');
        return \view('accounts.index')->with('client', $client);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = DB::select('select name from clients');
        return \view('accounts.create')->with('client', $client);
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
            "name" => "required|string",
            "account" => "required|numeric",
            "date" => "required|string"
        ]);
        $account = new Account();
        $account->name = $request->name;
        $account->account = $request->account;
        $account->date = $request->date;
        $account->save();
        return \redirect()->back()->with("done", "done");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $request->validate([
            "name" => "required|string",
        ]);
        $name = $request->name;
        $client = DB::table("clients")->where("name",'=',$name)->first();
        $cut = DB::table('cuts')->where("clientName",'=',$name)->get();
        $give = DB::table('gives')->where("clientName",'=',$name)->get();
        $account = DB::table('accounts')->where("name",'=',$name)->get();
        $totalGive = DB::table('receipts')->where("clientName",'=',$name)->sum('total');
        $totalAccount = DB::table('accounts')->where("name",'=',$name)->sum('account');
        return view('accounts.show')->with('client',$client)
        ->with('cut',$cut)
        ->with('give',$give)
        ->with('account',$account)
        ->with('totalGive',$totalGive)
        ->with('totalAccount',$totalAccount);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::find($id);
        $account->delete();
        return \redirect()->back()->with("remove","remove");
    }
}
