<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DueRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'contractNum' => 'required|string|exists:contracts,id',
            "dueDate" => 'required|date',
            "dueInstallment" => 'required|integer|max_digits:255',
            "pay" => 'nullable|integer|max_digits:255|lte:dueInstallment',
            "dueData" => 'nullable|string|max:255',
            "duePdf" => 'nullable|file|mimes:pdf',
        ];
    }

    public function messages(): array
    {
        return [
            'contractNum.required' => 'رقم العقد مطلوب.',
            'contractNum.string' => 'رقم العقد يجب أن يكون نصًا.',
            'contractNum.exists' => 'رقم العقد غير موجود في السجلات.',
            'dueDate.required' => 'تاريخ الاستحقاق مطلوب.',
            'dueDate.date' => 'تاريخ الاستحقاق يجب أن يكون تاريخًا صالحًا.',
            'dueInstallment.required' => 'قيمة القسط المستحق مطلوبة.',
            'dueInstallment.integer' => 'قيمة القسط يجب أن تكون عددًا صحيحًا.',
            'dueInstallment.max' => 'قيمة القسط يجب ألا تتجاوز 255.',
            'pay.integer' => 'المبلغ المدفوع يجب أن يكون عددًا صحيحًا.',
            'pay.max' => 'المبلغ المدفوع يجب ألا يتجاوز 255.',
            'pay.lte' => 'المبلغ المدفوع يجب أن يكون أقل من أو يساوي القسط المستحق.',
            'dueData.string' => 'تفاصيل الاستحقاق يجب أن تكون نصًا.',
            'dueData.max' => 'تفاصيل الاستحقاق يجب ألا تتجاوز 255 حرفًا.',
            'duePdf.file' => 'يجب أن يكون الملف المرفق من نوع ملف.',
            'duePdf.mimes' => 'الملف يجب أن يكون بصيغة PDF.',
            'duePdf.max' => 'يجب ألا يتجاوز حجم الملف 2 ميجابايت.',
        ];
    }
}
