<?php

namespace App\Exports;

use App\Models\Due;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DuesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $dues = DB::table('duesjoincontracts')->get();
        // return Due::all();
        return $dues;
    }

    public function headings(): array
    {
        return [
            "كود", "رقم العقد", "تاريخ الاستحقاق", "القسط المستحق", "المسدد",
            "البيان", "اسم ملف الاستحقاق", "اسم المبى", "نوع المبنى", "اسم المشروع",
            "المدينة", "مكونات العقار", "اسم المالك", "هاتف المالك", "اسم الوكيل",
            "هاتف الوكيل", "رقم الوكالة", "تاريخ انتهاء الوكالة", "اسم الوسيط",
            "هاتف الوسيط", "اسم المسؤول عن العقار", "هاتف المسؤول عن العقار",
            "نوع العقد", "مدة العقد", "تفاصيل العقد", "قيمة العقد",
            "تاريخ بداية العقد", "تاريخ نهاية العقد", "اسم ملف العقد",
            "العقار مرخص سكن جماعي للافراد", "اسم ملف الترخيص"
        ];
    }
}
