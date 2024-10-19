<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractWaterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "start" => ['required', 'date'],
            "end" => ['required', 'date', 'after:start'],
            "value" => ['required', 'integer', 'max_digits:255'],
            "PDF" => ['nullable', 'file', 'mimes:pdf']
        ];
    }

    public function messages(): array
    {
        return [
            'start.required' => 'تاريخ البداية مطلوب.',
            'start.date' => 'تاريخ البداية يجب أن يكون تاريخًا صالحًا.',
            'end.required' => 'تاريخ النهاية مطلوب.',
            'end.date' => 'تاريخ النهاية يجب أن يكون تاريخًا صالحًا.',
            'end.after' => 'تاريخ النهاية يجب أن يكون بعد تاريخ البداية.',
            'value.required' => 'قيمة العقد مطلوبة.',
            'value.integer' => 'قيمة العقد يجب أن تكون عددًا صحيحًا.',
            'value.max_digits' => 'قيمة العقد يجب ألا تتجاوز 255 خانة.',
            'PDF.file' => 'يجب أن يكون الملف المرفق من نوع ملف.',
            'PDF.mimes' => 'الملف يجب أن يكون بصيغة PDF.',
        ];
    }
}
