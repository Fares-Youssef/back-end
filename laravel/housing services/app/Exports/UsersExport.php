<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table("newSub")->get();
    }

    public function headings(): array
    {
        return [
            "00","الرقم الوظيفي","المقر","رقم الكبينة",
            "رقم الغرفة","رقم الايصال","الميز","نوع الاشتراك",
            "قيمة الاشتراك","فتره الاشتراك","مسئول الميز",
            "توقيع المشترك","المهنة","رقم الهوية \ الاقامة",
            "المنطقة","الموقع","الجنسية","حالة","المدينة التابع لها المقر"
        ];
    }
}
