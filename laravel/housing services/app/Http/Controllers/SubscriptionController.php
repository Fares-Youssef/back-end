<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Data;
use App\Models\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

use League\CommonMark\Extension\Table\Table;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {

        return Excel::download(new UsersExport, 'data.xlsx');
    }


    public function index()
    {
        if (\auth()->user()->type == "مدير موقع") {
            $sub = DB::table('subjoindata')->paginate(9);
            return \view('subscriptions.index')->with("sub", $sub);
        } elseif (\auth()->user()->type == "مدير مقر") {
            $location = auth()->user()->location;
            $sub = DB::table('subjoindata')->where("locationName", '=', $location)->paginate(9);
            return \view('subscriptions.index')->with("sub", $sub);
        } elseif (\auth()->user()->type == "مدير مدينة") {
            $location = auth()->user()->location;
            $sub = DB::table('newSub')->where("city2", '=', $location)->paginate(9);
            return \view('subscriptions.index')->with("sub", $sub);
        }
    }

    public function search(Request $request)
    {
        $request->validate([
            "search" => "required",
        ]);
        $num = $request->search;
        // $sub2 = DB::select("SELECT * FROM `subjoindata`WHERE CONCAT_WS('',subNum,food,start,locationName) LIKE '%$num%' limit 9");
        // \dd($sub);
        $sub = DB::table("subjoindata")->where("subNum", "=", $num)
            ->orWhere('locationName', 'like', '%' . $num . '%')
            ->orWhere('food', 'like', '%' . $num . '%')
            ->orWhere('start', 'like', '%' . $num . '%')
            ->paginate(9);
        return \view('subscriptions.index')->with('sub', $sub);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            "num" => "required|numeric"
        ]);
        $dates = Date::find(1);
        $date = $dates->date;
        $num = $request->num;
        $item = DB::table("subscriptions")->where("subNum", "=", $num)->get();
        foreach ($item as $item) {
            if ($date == $item->start) {
                return \redirect()->back()->with("er", "er");
            }
        };
        $data = DB::table("data")->where("num", "=", $num)->get();
        foreach ($data as $item) {
            $id =  $item->id;
            $item = Data::find($id);
            $date = Date::find(1);
            $location = DB::table("locations")->get();
            return \view('subscriptions.create')->with("item", $item)->with("date", $date)->with("location", $location);
        }
        return \redirect()->back()->with("error", "error");
    }

    public function toCreate()
    {
        $date = Date::find(1);
        return \view('subscriptions.toCreate')->with("date", $date);
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
            "food" => "required|string",
            "value" => "required|numeric",
            "start" => "required|string",
            "locationName" => "required|string",
        ]);
        $drive = new Subscription();
        $drive->subNum = $request->subNum;
        $drive->locationName = $request->locationName;
        $drive->box = $request->box;
        $drive->room = $request->room;
        $drive->receipt = $request->receipt;
        $drive->food = $request->food;
        $drive->type = $request->type;
        $drive->value = $request->value;
        $drive->start = $request->start;
        $drive->chef = $request->chef;
        $drive->signature = $request->signature;
        $drive->save();
        return \redirect()->route('sub.toCreate')->with("done", "done");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table("subjoindata")->where("id", "=", $id)->get();
        foreach ($data as $sub) {
            $location = DB::table("locations")->get();
            return \view('subscriptions.edit')->with("sub", $sub)->with('location', $location);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "food" => "required|string",
            "value" => "required|numeric",
            "start" => "required|string",
        ]);
        $drive = Subscription::find($id);
        $drive->subNum = $request->subNum;
        $drive->locationName = $request->locationName;
        $drive->box = $request->box;
        $drive->room = $request->room;
        $drive->receipt = $request->receipt;
        $drive->food = $request->food;
        $drive->type = $request->type;
        $drive->value = $request->value;
        $drive->start = $request->start;
        $drive->chef = $request->chef;
        $drive->signature = $request->signature;
        $drive->save();
        return \redirect()->route('sub.index')->with("done", "done");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub = Subscription::find($id);
        $sub->delete();
        return \redirect()->route('sub.index')->with("del", "del");
    }


    public function toHome()
    {
        $location = DB::table("locations")->get();
        return \view('subscriptions.toHome')->with('location', $location);
    }

    public function home(Request $request)
    {
        $request->validate([
            "name" => "required|string"
        ]);
        $location = $request->name;
        $date = $request->date;
        if ($date == null) {
            // البيانات الخاصة بالاشتراكات
            // عدد المشتركين
            $ARABICCount = count(DB::table("subjoindata")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->get());
            $INDIANCount = count(DB::table("subjoindata")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->get());
            $PAKISTANICount = count(DB::table("subjoindata")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->get());
            $SRICount = count(DB::table("subjoindata")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->get());
            $BENGALICount = count(DB::table("subjoindata")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->get());
            $FILIPINOCount = count(DB::table("subjoindata")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->get());

            // قيمة الاشتراك
            $ARABICValue = DB::select("select value from subjoindata where food = 'العربي-ARABIC' And locationName = '$location' ");
            $INDIANCValue = DB::select("select value from subjoindata where food = 'الهندي-INDIAN' And locationName = '$location' ");
            $PAKISTANIValue = DB::select("select value from subjoindata where food = 'باكستانى-PAKISTANI' And locationName = '$location' ");
            $SRIValue = DB::select("select value from subjoindata where food = 'سريلانكي-SRI LANKAN' And locationName = '$location' ");
            $BENGALIValue = DB::select("select value from subjoindata where food = 'بنجالي-BENGALI' And locationName = '$location' ");
            $FILIPINOValue = DB::select("select value from subjoindata where food = 'فلبينى-FILIPINO' And locationName = '$location' ");

            //جنسيات المشتركين
            $egypt2 = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("locationName", "=", $location)->get());
            $British2 = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("locationName", "=", $location)->get());
            $Saudi2 = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("locationName", "=", $location)->get());
            $Senegalese2 = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("locationName", "=", $location)->get());
            $Turkish2 = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("locationName", "=", $location)->get());
            $Vietnamese2 = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("locationName", "=", $location)->get());
            $Bengali2 = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("locationName", "=", $location)->get());
            $SriLankan2 = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("locationName", "=", $location)->get());
            $Sudanese2 = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("locationName", "=", $location)->get());
            $Syrian2 = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("locationName", "=", $location)->get());
            $Indian2 = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("locationName", "=", $location)->get());
            $Yemeni2 = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("locationName", "=", $location)->get());

            //الجدول
            $BritishJoinA = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->get());
            $BritishJoinI = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->get());
            $BritishJoinP = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->get());
            $BritishJoinS = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->get());
            $BritishJoinB = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->get());
            $BritishJoinF = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->get());

            $SaudiJoinA = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->get());
            $SaudiJoinI = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->get());
            $SaudiJoinP = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->get());
            $SaudiJoinS = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->get());
            $SaudiJoinB = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->get());
            $SaudiJoinF = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->get());

            $SenegaleseJoinA = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->get());
            $SenegaleseJoinI = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->get());
            $SenegaleseJoinP = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->get());
            $SenegaleseJoinS = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->get());
            $SenegaleseJoinB = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->get());
            $SenegaleseJoinF = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->get());

            $TurkishJoinA = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->get());
            $TurkishJoinI = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->get());
            $TurkishJoinP = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->get());
            $TurkishJoinS = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->get());
            $TurkishJoinB = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->get());
            $TurkishJoinF = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->get());

            $VietnameseJoinA = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->get());
            $VietnameseJoinI = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->get());
            $VietnameseJoinP = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->get());
            $VietnameseJoinS = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->get());
            $VietnameseJoinB = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->get());
            $VietnameseJoinF = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->get());

            $BengaliJoinA = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->get());
            $BengaliJoinI = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->get());
            $BengaliJoinP = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->get());
            $BengaliJoinS = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->get());
            $BengaliJoinB = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->get());
            $BengaliJoinF = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->get());

            $SriLankanJoinA = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->get());
            $SriLankanJoinI = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->get());
            $SriLankanJoinP = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->get());
            $SriLankanJoinS = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->get());
            $SriLankanJoinB = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->get());
            $SriLankanJoinF = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->get());

            $SudaneseJoinA = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->get());
            $SudaneseJoinI = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->get());
            $SudaneseJoinP = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->get());
            $SudaneseJoinS = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->get());
            $SudaneseJoinB = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->get());
            $SudaneseJoinF = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->get());

            $SyrianJoinA = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->get());
            $SyrianJoinI = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->get());
            $SyrianJoinP = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->get());
            $SyrianJoinS = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->get());
            $SyrianJoinB = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->get());
            $SyrianJoinF = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->get());

            $IndianJoinA = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->get());
            $IndianJoinI = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->get());
            $IndianJoinP = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->get());
            $IndianJoinS = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->get());
            $IndianJoinB = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->get());
            $IndianJoinF = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->get());

            $YemeniJoinA = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->get());
            $YemeniJoinI = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->get());
            $YemeniJoinP = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->get());
            $YemeniJoinS = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->get());
            $YemeniJoinB = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->get());
            $YemeniJoinF = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->get());

            $egyptJoinA = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->get());
            $egyptJoinI = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->get());
            $egyptJoinP = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->get());
            $egyptJoinS = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->get());
            $egyptJoinB = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->get());
            $egyptJoinF = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->get());
        }else{
            // البيانات الخاصة بالاشتراكات
            // عدد المشتركين
            $ARABICCount = count(DB::table("subjoindata")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $INDIANCount = count(DB::table("subjoindata")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $PAKISTANICount = count(DB::table("subjoindata")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SRICount = count(DB::table("subjoindata")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $BENGALICount = count(DB::table("subjoindata")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $FILIPINOCount = count(DB::table("subjoindata")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->where("start","=",$date)->get());

            // قيمة الاشتراك
            $ARABICValue = DB::select("select value from subjoindata where food = 'العربي-ARABIC' And locationName = '$location' And start = '$date' ");
            $INDIANCValue = DB::select("select value from subjoindata where food = 'الهندي-INDIAN' And locationName = '$location' And start = '$date' ");
            $PAKISTANIValue = DB::select("select value from subjoindata where food = 'باكستانى-PAKISTANI' And locationName = '$location' And start = '$date' ");
            $SRIValue = DB::select("select value from subjoindata where food = 'سريلانكي-SRI LANKAN' And locationName = '$location' And start = '$date' ");
            $BENGALIValue = DB::select("select value from subjoindata where food = 'بنجالي-BENGALI' And locationName = '$location' And start = '$date' ");
            $FILIPINOValue = DB::select("select value from subjoindata where food = 'فلبينى-FILIPINO' And locationName = '$location' And start = '$date' ");

            //جنسيات المشتركين
            $egypt2 = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("locationName", "=", $location)->where("start","=",$date)->get());
            $British2 = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("locationName", "=", $location)->where("start","=",$date)->get());
            $Saudi2 = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("locationName", "=", $location)->where("start","=",$date)->get());
            $Senegalese2 = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("locationName", "=", $location)->where("start","=",$date)->get());
            $Turkish2 = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("locationName", "=", $location)->where("start","=",$date)->get());
            $Vietnamese2 = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("locationName", "=", $location)->where("start","=",$date)->get());
            $Bengali2 = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SriLankan2 = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("locationName", "=", $location)->where("start","=",$date)->get());
            $Sudanese2 = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("locationName", "=", $location)->where("start","=",$date)->get());
            $Syrian2 = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("locationName", "=", $location)->where("start","=",$date)->get());
            $Indian2 = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("locationName", "=", $location)->where("start","=",$date)->get());
            $Yemeni2 = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("locationName", "=", $location)->where("start","=",$date)->get());

            //الجدول
            $BritishJoinA = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $BritishJoinI = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $BritishJoinP = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $BritishJoinS = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $BritishJoinB = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $BritishJoinF = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->where("start","=",$date)->get());

            $SaudiJoinA = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SaudiJoinI = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SaudiJoinP = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SaudiJoinS = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SaudiJoinB = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SaudiJoinF = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->where("start","=",$date)->get());

            $SenegaleseJoinA = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SenegaleseJoinI = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SenegaleseJoinP = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SenegaleseJoinS = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SenegaleseJoinB = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SenegaleseJoinF = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->where("start","=",$date)->get());

            $TurkishJoinA = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $TurkishJoinI = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $TurkishJoinP = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $TurkishJoinS = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $TurkishJoinB = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $TurkishJoinF = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->where("start","=",$date)->get());

            $VietnameseJoinA = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $VietnameseJoinI = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $VietnameseJoinP = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $VietnameseJoinS = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $VietnameseJoinB = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $VietnameseJoinF = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->where("start","=",$date)->get());

            $BengaliJoinA = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $BengaliJoinI = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $BengaliJoinP = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $BengaliJoinS = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $BengaliJoinB = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $BengaliJoinF = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->where("start","=",$date)->get());

            $SriLankanJoinA = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SriLankanJoinI = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SriLankanJoinP = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SriLankanJoinS = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SriLankanJoinB = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SriLankanJoinF = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->where("start","=",$date)->get());

            $SudaneseJoinA = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SudaneseJoinI = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SudaneseJoinP = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SudaneseJoinS = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SudaneseJoinB = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SudaneseJoinF = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->where("start","=",$date)->get());

            $SyrianJoinA = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SyrianJoinI = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SyrianJoinP = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SyrianJoinS = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SyrianJoinB = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $SyrianJoinF = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->where("start","=",$date)->get());

            $IndianJoinA = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $IndianJoinI = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $IndianJoinP = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $IndianJoinS = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $IndianJoinB = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $IndianJoinF = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->where("start","=",$date)->get());

            $YemeniJoinA = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $YemeniJoinI = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $YemeniJoinP = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $YemeniJoinS = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $YemeniJoinB = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $YemeniJoinF = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->where("start","=",$date)->get());

            $egyptJoinA = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("food", "=", 'العربي-ARABIC')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $egyptJoinI = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("food", "=", 'الهندي-INDIAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $egyptJoinP = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("food", "=", 'باكستانى-PAKISTANI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $egyptJoinS = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("food", "=", 'سريلانكي-SRI LANKAN')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $egyptJoinB = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("food", "=", 'بنجالي-BENGALI')->where("locationName", "=", $location)->where("start","=",$date)->get());
            $egyptJoinF = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("food", "=", 'فلبينى-FILIPINO')->where("locationName", "=", $location)->where("start","=",$date)->get());
        }
        return view('subscriptions.home')
            ->with("location", $location)
            ->with("egypt2", $egypt2)
            ->with("British2", $British2)
            ->with("Saudi2", $Saudi2)
            ->with("Senegalese2", $Senegalese2)
            ->with("Turkish2", $Turkish2)
            ->with("Vietnamese2", $Vietnamese2)
            ->with("Bengali2", $Bengali2)
            ->with("SriLankan2", $SriLankan2)
            ->with("Sudanese2", $Sudanese2)
            ->with("Syrian2", $Syrian2)
            ->with("Indian2", $Indian2)
            ->with("Yemeni2", $Yemeni2)
            ->with("ARABICCount", $ARABICCount)
            ->with("INDIANCount", $INDIANCount)
            ->with("PAKISTANICount", $PAKISTANICount)
            ->with("SRICount", $SRICount)
            ->with("BENGALICount", $BENGALICount)
            ->with("FILIPINOCount", $FILIPINOCount)
            ->with("ARABICValue", $ARABICValue)
            ->with("INDIANCValue", $INDIANCValue)
            ->with("PAKISTANIValue", $PAKISTANIValue)
            ->with("SRIValue", $SRIValue)
            ->with("BENGALIValue", $BENGALIValue)
            ->with("FILIPINOValue", $FILIPINOValue)
            ->with("BritishJoinA", $BritishJoinA)
            ->with("BritishJoinI", $BritishJoinI)
            ->with("BritishJoinP", $BritishJoinP)
            ->with("BritishJoinS", $BritishJoinS)
            ->with("BritishJoinB", $BritishJoinB)
            ->with("BritishJoinF", $BritishJoinF)
            ->with("SaudiJoinA", $SaudiJoinA)
            ->with("SaudiJoinI", $SaudiJoinI)
            ->with("SaudiJoinP", $SaudiJoinP)
            ->with("SaudiJoinS", $SaudiJoinS)
            ->with("SaudiJoinB", $SaudiJoinB)
            ->with("SaudiJoinF", $SaudiJoinF)
            ->with("SenegaleseJoinA", $SenegaleseJoinA)
            ->with("SenegaleseJoinI", $SenegaleseJoinI)
            ->with("SenegaleseJoinP", $SenegaleseJoinP)
            ->with("SenegaleseJoinS", $SenegaleseJoinS)
            ->with("SenegaleseJoinB", $SenegaleseJoinB)
            ->with("SenegaleseJoinF", $SenegaleseJoinF)
            ->with("TurkishJoinA", $TurkishJoinA)
            ->with("TurkishJoinI", $TurkishJoinI)
            ->with("TurkishJoinP", $TurkishJoinP)
            ->with("TurkishJoinS", $TurkishJoinS)
            ->with("TurkishJoinB", $TurkishJoinB)
            ->with("TurkishJoinF", $TurkishJoinF)
            ->with("VietnameseJoinA", $VietnameseJoinA)
            ->with("VietnameseJoinI", $VietnameseJoinI)
            ->with("VietnameseJoinP", $VietnameseJoinP)
            ->with("VietnameseJoinS", $VietnameseJoinS)
            ->with("VietnameseJoinB", $VietnameseJoinB)
            ->with("VietnameseJoinF", $VietnameseJoinF)
            ->with("BengaliJoinA", $BengaliJoinA)
            ->with("BengaliJoinI", $BengaliJoinI)
            ->with("BengaliJoinP", $BengaliJoinP)
            ->with("BengaliJoinS", $BengaliJoinS)
            ->with("BengaliJoinB", $BengaliJoinB)
            ->with("BengaliJoinF", $BengaliJoinF)
            ->with("SriLankanJoinA", $SriLankanJoinA)
            ->with("SriLankanJoinI", $SriLankanJoinI)
            ->with("SriLankanJoinP", $SriLankanJoinP)
            ->with("SriLankanJoinS", $SriLankanJoinS)
            ->with("SriLankanJoinB", $SriLankanJoinB)
            ->with("SriLankanJoinF", $SriLankanJoinF)
            ->with("SudaneseJoinA", $SudaneseJoinA)
            ->with("SudaneseJoinI", $SudaneseJoinI)
            ->with("SudaneseJoinP", $SudaneseJoinP)
            ->with("SudaneseJoinS", $SudaneseJoinS)
            ->with("SudaneseJoinB", $SudaneseJoinB)
            ->with("SudaneseJoinF", $SudaneseJoinF)
            ->with("SyrianJoinA", $SyrianJoinA)
            ->with("SyrianJoinI", $SyrianJoinI)
            ->with("SyrianJoinP", $SyrianJoinP)
            ->with("SyrianJoinS", $SyrianJoinS)
            ->with("SyrianJoinB", $SyrianJoinB)
            ->with("SyrianJoinF", $SyrianJoinF)
            ->with("IndianJoinA", $IndianJoinA)
            ->with("IndianJoinI", $IndianJoinI)
            ->with("IndianJoinP", $IndianJoinP)
            ->with("IndianJoinS", $IndianJoinS)
            ->with("IndianJoinB", $IndianJoinB)
            ->with("IndianJoinF", $IndianJoinF)
            ->with("YemeniJoinA", $YemeniJoinA)
            ->with("YemeniJoinI", $YemeniJoinI)
            ->with("YemeniJoinP", $YemeniJoinP)
            ->with("YemeniJoinS", $YemeniJoinS)
            ->with("YemeniJoinB", $YemeniJoinB)
            ->with("YemeniJoinF", $YemeniJoinF)
            ->with("egyptJoinA", $egyptJoinA)
            ->with("egyptJoinI", $egyptJoinI)
            ->with("egyptJoinP", $egyptJoinP)
            ->with("egyptJoinS", $egyptJoinS)
            ->with("egyptJoinB", $egyptJoinB)
            ->with("egyptJoinF", $egyptJoinF);
    }
}
