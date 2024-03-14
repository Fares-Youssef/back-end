<?php

namespace App\Http\Controllers;

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
        // البيانات الخاصة بالاشتراكات
        // عدد المشتركين
        $ARABICCount = count(DB::table("subjoindata")->where("food", "=", 'العربي-ARABIC')->get());
        $INDIANCount = count(DB::table("subjoindata")->where("food", "=", 'الهندي-INDIAN')->get());
        $PAKISTANICount = count(DB::table("subjoindata")->where("food", "=", 'باكستانى-PAKISTANI')->get());
        $SRICount = count(DB::table("subjoindata")->where("food", "=", 'سريلانكي-SRI LANKAN')->get());
        $BENGALICount = count(DB::table("subjoindata")->where("food", "=", 'بنجالي-BENGALI')->get());
        $FILIPINOCount = count(DB::table("subjoindata")->where("food", "=", 'فلبينى-FILIPINO')->get());

        // قيمة الاشتراك
        $ARABICValue = DB::select("select value from subjoindata where food = 'العربي-ARABIC' ");
        $INDIANCValue = DB::select("select value from subjoindata where food = 'الهندي-INDIAN' ");
        $PAKISTANIValue = DB::select("select value from subjoindata where food = 'باكستانى-PAKISTANI' ");
        $SRIValue = DB::select("select value from subjoindata where food = 'سريلانكي-SRI LANKAN' ");
        $BENGALIValue = DB::select("select value from subjoindata where food = 'بنجالي-BENGALI' ");
        $FILIPINOValue = DB::select("select value from subjoindata where food = 'فلبينى-FILIPINO' ");

        //جنسيات المشتركين
        $egypt2 = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->get());
        $British2 = count(DB::table("subjoindata")->where("nationality", "=", "British")->get());
        $Saudi2 = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->get());
        $Senegalese2 = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->get());
        $Turkish2 = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->get());
        $Vietnamese2 = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->get());
        $Bengali2 = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->get());
        $SriLankan2 = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->get());
        $Sudanese2 = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->get());
        $Syrian2 = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->get());
        $Indian2 = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->get());
        $Yemeni2 = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->get());

        //الجدول
        $BritishJoinA = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("food", "=", 'العربي-ARABIC')->get());
        $BritishJoinI = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("food", "=", 'الهندي-INDIAN')->get());
        $BritishJoinP = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("food", "=", 'باكستانى-PAKISTANI')->get());
        $BritishJoinS = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("food", "=", 'سريلانكي-SRI LANKAN')->get());
        $BritishJoinB = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("food", "=", 'بنجالي-BENGALI')->get());
        $BritishJoinF = count(DB::table("subjoindata")->where("nationality", "=", "British")->where("food", "=", 'فلبينى-FILIPINO')->get());

        $SaudiJoinA = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("food", "=", 'العربي-ARABIC')->get());
        $SaudiJoinI = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("food", "=", 'الهندي-INDIAN')->get());
        $SaudiJoinP = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("food", "=", 'باكستانى-PAKISTANI')->get());
        $SaudiJoinS = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("food", "=", 'سريلانكي-SRI LANKAN')->get());
        $SaudiJoinB = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("food", "=", 'بنجالي-BENGALI')->get());
        $SaudiJoinF = count(DB::table("subjoindata")->where("nationality", "=", "Saudi")->where("food", "=", 'فلبينى-FILIPINO')->get());

        $SenegaleseJoinA = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("food", "=", 'العربي-ARABIC')->get());
        $SenegaleseJoinI = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("food", "=", 'الهندي-INDIAN')->get());
        $SenegaleseJoinP = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("food", "=", 'باكستانى-PAKISTANI')->get());
        $SenegaleseJoinS = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("food", "=", 'سريلانكي-SRI LANKAN')->get());
        $SenegaleseJoinB = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("food", "=", 'بنجالي-BENGALI')->get());
        $SenegaleseJoinF = count(DB::table("subjoindata")->where("nationality", "=", "Senegalese")->where("food", "=", 'فلبينى-FILIPINO')->get());

        $TurkishJoinA = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("food", "=", 'العربي-ARABIC')->get());
        $TurkishJoinI = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("food", "=", 'الهندي-INDIAN')->get());
        $TurkishJoinP = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("food", "=", 'باكستانى-PAKISTANI')->get());
        $TurkishJoinS = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("food", "=", 'سريلانكي-SRI LANKAN')->get());
        $TurkishJoinB = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("food", "=", 'بنجالي-BENGALI')->get());
        $TurkishJoinF = count(DB::table("subjoindata")->where("nationality", "=", "Turkish")->where("food", "=", 'فلبينى-FILIPINO')->get());

        $VietnameseJoinA = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("food", "=", 'العربي-ARABIC')->get());
        $VietnameseJoinI = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("food", "=", 'الهندي-INDIAN')->get());
        $VietnameseJoinP = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("food", "=", 'باكستانى-PAKISTANI')->get());
        $VietnameseJoinS = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("food", "=", 'سريلانكي-SRI LANKAN')->get());
        $VietnameseJoinB = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("food", "=", 'بنجالي-BENGALI')->get());
        $VietnameseJoinF = count(DB::table("subjoindata")->where("nationality", "=", "Vietnamese")->where("food", "=", 'فلبينى-FILIPINO')->get());

        $BengaliJoinA = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("food", "=", 'العربي-ARABIC')->get());
        $BengaliJoinI = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("food", "=", 'الهندي-INDIAN')->get());
        $BengaliJoinP = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("food", "=", 'باكستانى-PAKISTANI')->get());
        $BengaliJoinS = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("food", "=", 'سريلانكي-SRI LANKAN')->get());
        $BengaliJoinB = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("food", "=", 'بنجالي-BENGALI')->get());
        $BengaliJoinF = count(DB::table("subjoindata")->where("nationality", "=", "بنجالي-Bengali")->where("food", "=", 'فلبينى-FILIPINO')->get());

        $SriLankanJoinA = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("food", "=", 'العربي-ARABIC')->get());
        $SriLankanJoinI = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("food", "=", 'الهندي-INDIAN')->get());
        $SriLankanJoinP = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("food", "=", 'باكستانى-PAKISTANI')->get());
        $SriLankanJoinS = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("food", "=", 'سريلانكي-SRI LANKAN')->get());
        $SriLankanJoinB = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("food", "=", 'بنجالي-BENGALI')->get());
        $SriLankanJoinF = count(DB::table("subjoindata")->where("nationality", "=", "سريلانكي-Sri Lankan")->where("food", "=", 'فلبينى-FILIPINO')->get());

        $SudaneseJoinA = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("food", "=", 'العربي-ARABIC')->get());
        $SudaneseJoinI = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("food", "=", 'الهندي-INDIAN')->get());
        $SudaneseJoinP = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("food", "=", 'باكستانى-PAKISTANI')->get());
        $SudaneseJoinS = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("food", "=", 'سريلانكي-SRI LANKAN')->get());
        $SudaneseJoinB = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("food", "=", 'بنجالي-BENGALI')->get());
        $SudaneseJoinF = count(DB::table("subjoindata")->where("nationality", "=", "سوداني-Sudanese")->where("food", "=", 'فلبينى-FILIPINO')->get());

        $SyrianJoinA = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("food", "=", 'العربي-ARABIC')->get());
        $SyrianJoinI = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("food", "=", 'الهندي-INDIAN')->get());
        $SyrianJoinP = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("food", "=", 'باكستانى-PAKISTANI')->get());
        $SyrianJoinS = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("food", "=", 'سريلانكي-SRI LANKAN')->get());
        $SyrianJoinB = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("food", "=", 'بنجالي-BENGALI')->get());
        $SyrianJoinF = count(DB::table("subjoindata")->where("nationality", "=", "سورى-Syrian")->where("food", "=", 'فلبينى-FILIPINO')->get());

        $IndianJoinA = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("food", "=", 'العربي-ARABIC')->get());
        $IndianJoinI = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("food", "=", 'الهندي-INDIAN')->get());
        $IndianJoinP = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("food", "=", 'باكستانى-PAKISTANI')->get());
        $IndianJoinS = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("food", "=", 'سريلانكي-SRI LANKAN')->get());
        $IndianJoinB = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("food", "=", 'بنجالي-BENGALI')->get());
        $IndianJoinF = count(DB::table("subjoindata")->where("nationality", "=", "هندي-Indian")->where("food", "=", 'فلبينى-FILIPINO')->get());

        $YemeniJoinA = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("food", "=", 'العربي-ARABIC')->get());
        $YemeniJoinI = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("food", "=", 'الهندي-INDIAN')->get());
        $YemeniJoinP = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("food", "=", 'باكستانى-PAKISTANI')->get());
        $YemeniJoinS = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("food", "=", 'سريلانكي-SRI LANKAN')->get());
        $YemeniJoinB = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("food", "=", 'بنجالي-BENGALI')->get());
        $YemeniJoinF = count(DB::table("subjoindata")->where("nationality", "=", "يمنى-Yemeni")->where("food", "=", 'فلبينى-FILIPINO')->get());

        $egyptJoinA = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("food", "=", 'العربي-ARABIC')->get());
        $egyptJoinI = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("food", "=", 'الهندي-INDIAN')->get());
        $egyptJoinP = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("food", "=", 'باكستانى-PAKISTANI')->get());
        $egyptJoinS = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("food", "=", 'سريلانكي-SRI LANKAN')->get());
        $egyptJoinB = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("food", "=", 'بنجالي-BENGALI')->get());
        $egyptJoinF = count(DB::table("subjoindata")->where("nationality", "=", "مصري-Egyptian")->where("food", "=", 'فلبينى-FILIPINO')->get());


        // البيانات الخاصة بالعمالة
        $egypt = count(DB::table("data")->where("nationality", "=", "مصري-Egyptian")->get());
        $British = count(DB::table("data")->where("nationality", "=", "British")->get());
        $Saudi = count(DB::table("data")->where("nationality", "=", "Saudi")->get());
        $Senegalese = count(DB::table("data")->where("nationality", "=", "Senegalese")->get());
        $Turkish = count(DB::table("data")->where("nationality", "=", "Turkish")->get());
        $Vietnamese = count(DB::table("data")->where("nationality", "=", "Vietnamese")->get());
        $Bengali = count(DB::table("data")->where("nationality", "=", "بنجالي-Bengali")->get());
        $SriLankan = count(DB::table("data")->where("nationality", "=", "سريلانكي-Sri Lankan")->get());
        $Sudanese = count(DB::table("data")->where("nationality", "=", "سوداني-Sudanese")->get());
        $Syrian = count(DB::table("data")->where("nationality", "=", "سورى-Syrian")->get());
        $Indian = count(DB::table("data")->where("nationality", "=", "هندي-Indian")->get());
        $Yemeni = count(DB::table("data")->where("nationality", "=", "يمنى-Yemeni")->get());


        return view('home')
        ->with("egypt",$egypt)
        ->with("British",$British)
        ->with("Saudi",$Saudi)
        ->with("Senegalese",$Senegalese)
        ->with("Turkish",$Turkish)
        ->with("Vietnamese",$Vietnamese)
        ->with("Bengali",$Bengali)
        ->with("SriLankan",$SriLankan)
        ->with("Sudanese",$Sudanese)
        ->with("Syrian",$Syrian)
        ->with("Indian",$Indian)
        ->with("Yemeni",$Yemeni)
        ->with("egypt2",$egypt2)
        ->with("British2",$British2)
        ->with("Saudi2",$Saudi2)
        ->with("Senegalese2",$Senegalese2)
        ->with("Turkish2",$Turkish2)
        ->with("Vietnamese2",$Vietnamese2)
        ->with("Bengali2",$Bengali2)
        ->with("SriLankan2",$SriLankan2)
        ->with("Sudanese2",$Sudanese2)
        ->with("Syrian2",$Syrian2)
        ->with("Indian2",$Indian2)
        ->with("Yemeni2",$Yemeni2)
        ->with("ARABICCount",$ARABICCount)
        ->with("INDIANCount",$INDIANCount)
        ->with("PAKISTANICount",$PAKISTANICount)
        ->with("SRICount",$SRICount)
        ->with("BENGALICount",$BENGALICount)
        ->with("FILIPINOCount",$FILIPINOCount)
        ->with("ARABICValue",$ARABICValue)
        ->with("INDIANCValue",$INDIANCValue)
        ->with("PAKISTANIValue",$PAKISTANIValue)
        ->with("SRIValue",$SRIValue)
        ->with("BENGALIValue",$BENGALIValue)
        ->with("FILIPINOValue",$FILIPINOValue)
        ->with("BritishJoinA",$BritishJoinA)
        ->with("BritishJoinI",$BritishJoinI)
        ->with("BritishJoinP",$BritishJoinP)
        ->with("BritishJoinS",$BritishJoinS)
        ->with("BritishJoinB",$BritishJoinB)
        ->with("BritishJoinF",$BritishJoinF)
        ->with("SaudiJoinA",$SaudiJoinA)
        ->with("SaudiJoinI",$SaudiJoinI)
        ->with("SaudiJoinP",$SaudiJoinP)
        ->with("SaudiJoinS",$SaudiJoinS)
        ->with("SaudiJoinB",$SaudiJoinB)
        ->with("SaudiJoinF",$SaudiJoinF)
        ->with("SenegaleseJoinA",$SenegaleseJoinA)
        ->with("SenegaleseJoinI",$SenegaleseJoinI)
        ->with("SenegaleseJoinP",$SenegaleseJoinP)
        ->with("SenegaleseJoinS",$SenegaleseJoinS)
        ->with("SenegaleseJoinB",$SenegaleseJoinB)
        ->with("SenegaleseJoinF",$SenegaleseJoinF)
        ->with("TurkishJoinA",$TurkishJoinA)
        ->with("TurkishJoinI",$TurkishJoinI)
        ->with("TurkishJoinP",$TurkishJoinP)
        ->with("TurkishJoinS",$TurkishJoinS)
        ->with("TurkishJoinB",$TurkishJoinB)
        ->with("TurkishJoinF",$TurkishJoinF)
        ->with("VietnameseJoinA",$VietnameseJoinA)
        ->with("VietnameseJoinI",$VietnameseJoinI)
        ->with("VietnameseJoinP",$VietnameseJoinP)
        ->with("VietnameseJoinS",$VietnameseJoinS)
        ->with("VietnameseJoinB",$VietnameseJoinB)
        ->with("VietnameseJoinF",$VietnameseJoinF)
        ->with("BengaliJoinA",$BengaliJoinA)
        ->with("BengaliJoinI",$BengaliJoinI)
        ->with("BengaliJoinP",$BengaliJoinP)
        ->with("BengaliJoinS",$BengaliJoinS)
        ->with("BengaliJoinB",$BengaliJoinB)
        ->with("BengaliJoinF",$BengaliJoinF)
        ->with("SriLankanJoinA",$SriLankanJoinA)
        ->with("SriLankanJoinI",$SriLankanJoinI)
        ->with("SriLankanJoinP",$SriLankanJoinP)
        ->with("SriLankanJoinS",$SriLankanJoinS)
        ->with("SriLankanJoinB",$SriLankanJoinB)
        ->with("SriLankanJoinF",$SriLankanJoinF)
        ->with("SudaneseJoinA",$SudaneseJoinA)
        ->with("SudaneseJoinI",$SudaneseJoinI)
        ->with("SudaneseJoinP",$SudaneseJoinP)
        ->with("SudaneseJoinS",$SudaneseJoinS)
        ->with("SudaneseJoinB",$SudaneseJoinB)
        ->with("SudaneseJoinF",$SudaneseJoinF)
        ->with("SyrianJoinA",$SyrianJoinA)
        ->with("SyrianJoinI",$SyrianJoinI)
        ->with("SyrianJoinP",$SyrianJoinP)
        ->with("SyrianJoinS",$SyrianJoinS)
        ->with("SyrianJoinB",$SyrianJoinB)
        ->with("SyrianJoinF",$SyrianJoinF)
        ->with("IndianJoinA",$IndianJoinA)
        ->with("IndianJoinI",$IndianJoinI)
        ->with("IndianJoinP",$IndianJoinP)
        ->with("IndianJoinS",$IndianJoinS)
        ->with("IndianJoinB",$IndianJoinB)
        ->with("IndianJoinF",$IndianJoinF)
        ->with("YemeniJoinA",$YemeniJoinA)
        ->with("YemeniJoinI",$YemeniJoinI)
        ->with("YemeniJoinP",$YemeniJoinP)
        ->with("YemeniJoinS",$YemeniJoinS)
        ->with("YemeniJoinB",$YemeniJoinB)
        ->with("YemeniJoinF",$YemeniJoinF)
        ->with("egyptJoinA",$egyptJoinA)
        ->with("egyptJoinI",$egyptJoinI)
        ->with("egyptJoinP",$egyptJoinP)
        ->with("egyptJoinS",$egyptJoinS)
        ->with("egyptJoinB",$egyptJoinB)
        ->with("egyptJoinF",$egyptJoinF)
        ;
    }
}
