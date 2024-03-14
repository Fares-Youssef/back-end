<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Due;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = DB::table("contracts")->paginate(7);
        $time = DB::table("details")->get();
        $cities = DB::table("cities")->get();
        $contract = DB::table("contracts")->get();
        return \view('contracts.index')->with("contracts", $contracts)->with("contract", $contract)->with("time", $time)->with("cities", $cities)->with("fares", 1);
    }

    public function search(Request $request)
    {
        $buildingNum = $request->buildingNum;
        $contractType = $request->contractType;
        $city = $request->city;
        if ($buildingNum == null && $contractType == null && $city == null) {
            $contracts = DB::table("contracts")->get();
        }
        if ($buildingNum != null && $contractType == null && $city == null) {
            $contracts = DB::table("contracts")->where("buildingNum", "=", $buildingNum)->get();
        }
        if ($buildingNum == null && $contractType != null && $city == null) {
            $contracts = DB::table("contracts")->where("contractType", "=", $contractType)->get();
        }
        if ($buildingNum == null && $contractType == null && $city != null) {
            $contracts = DB::table("contracts")->where("city", "=", $city)->get();
        }
        if ($buildingNum != null && $contractType != null && $city == null) {
            $contracts = DB::table("contracts")->where("buildingNum", "=", $buildingNum)->where("contractType", "=", $contractType)->get();
        }
        if ($buildingNum != null && $contractType == null && $city != null) {
            $contracts = DB::table("contracts")->where("buildingNum", "=", $buildingNum)->where("city", "=", $city)->get();
        }
        if ($buildingNum == null && $contractType != null && $city != null) {
            $contracts = DB::table("contracts")->where("city", "=", $city)->where("contractType", "=", $contractType)->get();
        }
        if ($buildingNum != null && $contractType != null && $city != null) {
            $contracts = DB::table("contracts")->where("city", "=", $city)->where("contractType", "=", $contractType)->where("buildingNum", "=", $buildingNum)->get();
        }
        $time = DB::table("details")->get();
        $cities = DB::table("cities")->get();
        $contract = DB::table("contracts")->get();
        return \view('contracts.index')->with("contracts", $contracts)->with("contract", $contract)->with("time", $time)->with("cities", $cities)->with("cities", $cities)->with("fares", 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $time = DB::table("times")->get();
        $type = DB::table("types")->get();
        $city = DB::table("cities")->get();
        $detail = DB::table("details")->get();
        return \view("contracts.create")->with("time", $time)->with("city", $city)->with("detail", $detail)->with("type", $type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileSiza = 1024 * 3;
        $request->validate([
            'buildingNum' => "required|string|min:2|max:50|unique:contracts",
            'file' => "mimes:png,jpg,pdf|max:$fileSiza",
            'fileTwo' => "mimes:png,jpg,pdf|max:$fileSiza"
        ]);
        $drive = new Contract();
        $drive->buildingNum = $request->buildingNum;
        $buildingNum = $request->buildingNum;
        $drive->buildingName = $request->buildingName;
        $drive->buildingType = $request->buildingType;
        $drive->projectName = $request->projectName;
        $drive->city = $request->city;
        $drive->buildingIn = $request->buildingIn;
        $drive->ownerName = $request->ownerName;
        $drive->ownerPhone = $request->ownerPhone;
        $drive->agentName = $request->agentName;
        $drive->agentPhone = $request->agentPhone;
        $drive->agencyNum = $request->agencyNum;
        $drive->agencyDate = $request->agencyDate;
        $drive->mediatorName = $request->mediatorName;
        $drive->mediatorPhone = $request->mediatorPhone;
        $drive->Administrator = $request->Administrator;
        $drive->AdministratorPhone = $request->AdministratorPhone;
        $drive->contractType = $request->contractType;
        $drive->contractTime = $request->contractTime;
        $drive->contractDetails = $request->contractDetails;
        $drive->contractValue = $request->contractValue;
        $drive->contractStart = $request->contractStart;
        $drive->contractEnd = $request->contractEnd;
        $drive->rentStart = $request->rentStart;
        $drive->rentEnd = $request->rentEnd;
        $drive->rentValue = $request->rentValue;
        $drive->rentTime = $request->rentTime;
        // upload file code
            if ($request->file("file") != null) {
                $drive_data = $request->file("file");
                $drive_name = \time() . $drive_data->getClientOriginalName();
                $location =  \public_path('./PDF folder/');
                $drive_data->move($location, $drive_name);
                $drive->contractPDF = $drive_name;
            }
        $drive->checkbox = $request->checkbox;
        if ($request->file("fileTwo") != null) {
            $drive2_data = $request->file("fileTwo");
            $drive2_name = \time() . $drive2_data->getClientOriginalName();
            $location =  \public_path('./PDF folder/');
            $drive2_data->move($location, $drive2_name);
            $drive->checkboxPDF = $drive2_name;
        }
        $drive->textArea = $request->textArea;
        $drive->save();
        return \redirect()->route('contract.createDue', $buildingNum);
        // \dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drive = Contract::find($id);
        $dues = DB::table("dues")->where("contractNum", "=", $drive->buildingNum)->get();
        $water = DB::table("waterjoincontract")->where("contractNum", "=", $drive->buildingNum)->get();
        $electric = DB::table("electricjoincontract")->where("contractNum", "=", $drive->buildingNum)->get();
        return \view('contracts.show')->with("drive", $drive)->with("dues", $dues)->with("water", $water)->with("electric", $electric);
    }


    public function download($id)
    {
        $drive = Contract::find($id);
        $drive_name = $drive->contractPDF;
        $path = \public_path() . "/PDF folder/" . $drive_name;
        return \response()->download($path);
    }
    public function downloadTwo($id)
    {
        $drive = Contract::find($id);
        $drive_name = $drive->checkboxPDF;
        $path = \public_path() . "/PDF folder/" . $drive_name;
        return \response()->download($path);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drive = Contract::find($id);
        $time = DB::table("times")->get();
        $city = DB::table("cities")->get();
        $detail = DB::table("details")->get();
        $type = DB::table("types")->get();
        return \view("contracts.edit")->with("time", $time)->with("city", $city)->with("detail", $detail)->with("drive", $drive)->with("type", $type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'buildingNum' => "required|string|min:2|max:50"
        ]);
        $drive = Contract::find($id);
        $drive->buildingNum = $request->buildingNum;
        $drive->buildingName = $request->buildingName;
        $drive->buildingType = $request->buildingType;
        $drive->projectName = $request->projectName;
        $drive->city = $request->city;
        $drive->buildingIn = $request->buildingIn;
        $drive->ownerName = $request->ownerName;
        $drive->ownerPhone = $request->ownerPhone;
        $drive->agentName = $request->agentName;
        $drive->agentPhone = $request->agentPhone;
        $drive->agencyNum = $request->agencyNum;
        $drive->agencyDate = $request->agencyDate;
        $drive->mediatorName = $request->mediatorName;
        $drive->mediatorPhone = $request->mediatorPhone;
        $drive->Administrator = $request->Administrator;
        $drive->AdministratorPhone = $request->AdministratorPhone;
        $drive->contractType = $request->contractType;
        $drive->contractTime = $request->contractTime;
        $drive->contractDetails = $request->contractDetails;
        $drive->contractValue = $request->contractValue;
        $drive->contractStart = $request->contractStart;
        $drive->contractEnd = $request->contractEnd;
        $drive->rentStart = $request->rentStart;
        $drive->rentEnd = $request->rentEnd;
        $drive->rentValue = $request->rentValue;
        $drive->rentTime = $request->rentTime;
        if ($request->file != null && $drive->contractPDF == null) {
            $drive_data = $request->file("file");
            $drive_name = \time() . $drive_data->getClientOriginalName();
            $location =  \public_path('./PDF folder/');
            $drive_data->move($location, $drive_name);
            $drive->contractPDF = $drive_name;
        } elseif ($request->file != null && $drive->contractPDF != null) {
            $path = \public_path() . "/PDF folder/" . $drive->contractPDF;
            \unlink($path);
            $drive_data = $request->file("file");
            $drive_name = \time() . $drive_data->getClientOriginalName();
            $location =  \public_path('./PDF folder/');
            $drive_data->move($location, $drive_name);
            $drive->contractPDF = $drive_name;
        }
        if ($request->checkbox != null) {
            $drive->checkbox = $request->checkbox;
            if ($request->file("fileTwo") != null) {
                $drive2_data = $request->file("fileTwo");
                $drive2_name = \time() . $drive2_data->getClientOriginalName();
                $location =  \public_path('./PDF folder/');
                $drive2_data->move($location, $drive2_name);
                $drive->checkboxPDF = $drive2_name;
            }
        } else {
            $drive->checkbox = $request->checkbox;
            $pathTwo = \public_path() . "/PDF folder/" . $drive->checkboxPDF;
            \unlink($pathTwo);
            $drive->checkboxPDF = null;
        }
        $drive->textArea = $request->textArea;
        $drive->save();
        return redirect()->route('contract.show', $id)->with("done", "uploaded file done");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drive = Contract::find($id);
        // $dues = DB::table("dues")->where("contractNum", "=", $drive->buildingNum)->delete();
        if ($drive->contractPDF != null) {
            $drive_name = $drive->contractPDF;
            $path = \public_path() . "/PDF folder/" . $drive_name;
            \unlink($path);
        }
        $drive->delete();
        return redirect()->route('contract.index')->with("remove", "remove file done");
    }


    public function createDue($buildingNum)
    {
        return \view('contracts.createDues')->with("buildingNum", $buildingNum);
    }
}
