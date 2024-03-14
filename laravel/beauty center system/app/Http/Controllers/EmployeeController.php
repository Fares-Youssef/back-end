<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Draw;
use App\Models\Advance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
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
        if($id == "fares youssef"){
            $employee = DB::table("employeesAllData")->get();
        }else{
            $employee = DB::table("employeesAllData")->where("userName", "=", $id)->get();
        }
        return \view('employees.index')->with("employee", $employee);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('employees.create');
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
            "name" => "required|unique:employees,name|string|max:50",
            "phone" => "required|string|numeric",
            "salary" => "required|string|numeric"
        ]);
        $userId = \auth()->user()->id;
        $employee = new employee();
        $employee->name = $request->name;
        $employee->userId = $userId;
        $employee->phone = $request->phone;
        $employee->salary = $request->salary;
        $employee->save();
        return redirect()->back()->with("done", "done");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    public function draw()
    {
        $id = \auth()->user()->name;
        if($id == "fares youssef"){
            $employee = DB::table("employeesAllData")->get();
        }else{
            $employee = DB::table("employeesAllData")->where("userName", "=", $id)->get();
        }
        return \view('employees.draw')->with("employee", $employee);
    }

    public function drawStore(Request $request)
    {
        $request->validate([
            "empId" => "required|string|max:50",
            "count" => "required|string",
            "date" => "required|string"
        ]);
        $userName = \auth()->user()->name;
        $employee = new draw();
        $employee->userName = $userName;
        $employee->empId = $request->empId;
        $employee->count = $request->count;
        $employee->date = $request->date;
        $employee->save();
        return redirect()->back()->with("done", "done");
    }

    public function advance()
    {
        $id = \auth()->user()->name;
        if($id == "fares youssef"){
            $employee = DB::table("employeesAllData")->get();
        }else{
            $employee = DB::table("employeesAllData")->where("userName", "=", $id)->get();
        }
        return \view('employees.advance')->with("employee", $employee);
    }

    public function advanceStore(Request $request)
    {
        $request->validate([
            "empId" => "required|string|max:50",
            "count" => "required|string",
            "date" => "required|string"
        ]);
        $userName = \auth()->user()->name;
        $employee = new advance();
        $employee->userName = $userName;
        $employee->empId = $request->empId;
        $employee->count = $request->count;
        $employee->date = $request->date;
        $employee->save();
        return redirect()->back()->with("done", "done");
        // \dd($request);
    }

    public function in()
    {
        $id = \auth()->user()->name;
        if($id == "fares youssef"){
            $employee = DB::table("employeesAllData")->get();
        }else{
            $employee = DB::table("employeesAllData")->where("userName", "=", $id)->get();
        }
        return \view('employees.in')->with("employee", $employee);
    }
    public function out()
    {
        $id = \auth()->user()->name;
        if($id == "fares youssef"){
            $employee = DB::table("employeesAllData")->get();
        }else{
            $employee = DB::table("employeesAllData")->where("userName", "=", $id)->get();
        }
        return \view('employees.out')->with("employee", $employee);
    }

    public function totalAdvance()
    {
        $id = \auth()->user()->name;
        if($id == "fares youssef"){
            $employee = DB::table("advances")->get();
        }else{
            $employee = DB::table("advances")->where("userName", "=", $id)->get();
        }
        return \view('employees.totalAdvance')->with("employee", $employee);
    }


    public function destroyAdvance($id)
    {
        $drive = advance::find($id);
        $drive->delete();
        return redirect()->back()->with("done", "done");
    }


    public function totalDraw()
    {
        $id = \auth()->user()->name;
        if($id == "fares youssef"){
            $employee = DB::table("draws")->get();
        }else{
            $employee = DB::table("draws")->where("userName", "=", $id)->get();
        }
        return \view('employees.totalDraw')->with("employee", $employee);
    }


    public function destroyDraw($id)
    {
        $drive = draw::find($id);
        $drive->delete();
        return redirect()->back()->with("done", "done");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = employee::find($id);
        $employee->delete();
        return redirect()->back()->with("done", "done");
    }
}
