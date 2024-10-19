<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
{
    public function rules()
    {
        $contractId = $this->route('contract');
        return [
            'buildingNum' => 'required|string|max:255|unique:contracts,buildingNum,' . $contractId,
            'buildingName' => 'required|string|max:255',
            'buildingType' => 'required|integer|exists:types,id',
            'projectName' => 'required|string|max:255',
            'city' => 'required|integer|exists:cities,id',
            'buildingIn' => 'required|string|max:255',
            'ownerName' => 'required|string|max:255',
            'ownerPhone' => 'required|numeric',
            'agentName' => 'nullable|string|max:255',
            'agentPhone' => 'nullable|numeric',
            'agencyNum' => 'nullable|string|max:255',
            'agencyDate' => 'nullable|date',
            'contractType' => 'required|integer|exists:details,id',
            'contractTime' => 'required|string|max:255',
            'contractDetails' => 'required|integer|exists:times,id',
            'contractValue' => 'required|numeric',
            'contractStart' => 'required|date',
            'contractEnd' => 'required|date|after:contractStart',
            'rentStart' => 'required|date',
            'rentEnd' => 'required|date|after:rentStart',
            'rentValue' => 'required|numeric',
            'rentTime' => 'required|string|max:255',
            'contractPDF' => 'nullable|file|mimes:pdf',
            'checkbox' => 'nullable|string|max:255',
            'checkboxPDF' => 'nullable|file|mimes:pdf',
            'textArea' => 'nullable|string',
            'done' => 'nullable|boolean',
            'type' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'buildingNum.required' => 'رقم العقد مطلوب.',
            'buildingNum.unique' => 'رقم العقد موجود بالفعل.',
            'buildingName.required' => 'حقل اسم المبنى مطلوب.',
            'buildingName.string' => 'حقل اسم المبنى يجب أن يكون نصاً.',
            'buildingType.required' => 'حقل نوع المبنى مطلوب.',
            'buildingType.string' => 'حقل نوع المبنى يجب أن يكون نصاً.',
            'projectName.required' => 'حقل اسم المشروع مطلوب.',
            'projectName.string' => 'حقل اسم المشروع يجب أن يكون نصاً.',
            'city.required' => 'الرجاء تحديد المدينة.',
            'city.string' => 'حقل المدينة يجب أن يكون نصاً.',
            'buildingIn.required' => 'حقل المبنى في مطلوب.',
            'buildingIn.string' => 'حقل المبنى في يجب أن يكون نصاً.',
            'ownerName.required' => 'حقل اسم المالك مطلوب.',
            'ownerName.string' => 'حقل اسم المالك يجب أن يكون نصاً.',
            'ownerPhone.required' => 'رقم الهاتف للمالك مطلوب.',
            'ownerPhone.numeric' => 'رقم الهاتف للمالك يجب أن يكون أرقاماً فقط.',
            'agentName.required' => 'حقل اسم الوكيل مطلوب.',
            'agentName.string' => 'حقل اسم الوكيل يجب أن يكون نصاً.',
            'agentPhone.required' => 'رقم الهاتف للوكيل مطلوب.',
            'agentPhone.numeric' => 'رقم الهاتف للوكيل يجب أن يكون أرقاماً فقط.',
            'agencyNum.required' => 'رقم الوكالة مطلوب.',
            'agencyNum.string' => 'رقم الوكالة يجب أن يكون نصياً.',
            'agencyDate.required' => 'تاريخ الوكالة مطلوب.',
            'agencyDate.date' => 'تاريخ الوكالة يجب أن يكون تاريخاً صحيحاً.',
            'contractType.required' => 'حقل نوع العقد مطلوب.',
            'contractType.string' => 'نوع العقد يجب أن يكون نصاً.',
            'contractTime.required' => 'مدة العقد مطلوبة.',
            'contractTime.string' => 'مدة العقد يجب أن تكون نصاً.',
            'contractDetails.required' => 'تفاصيل العقد مطلوبة.',
            'contractDetails.string' => 'تفاصيل العقد يجب أن تكون نصاً.',
            'contractValue.required' => 'قيمة العقد مطلوبة.',
            'contractValue.numeric' => 'قيمة العقد يجب أن تكون رقماً صحيحاً.',
            'contractStart.required' => 'تاريخ بداية العقد مطلوب.',
            'contractStart.date' => 'تاريخ بداية العقد يجب أن يكون تاريخاً صحيحاً.',
            'contractEnd.required' => 'تاريخ نهاية العقد مطلوب.',
            'contractEnd.date' => 'تاريخ نهاية العقد يجب أن يكون تاريخاً صحيحاً.',
            'contractEnd.after' => 'تاريخ نهاية العقد يجب أن يكون بعد تاريخ بدايته.',
            'rentStart.required' => 'تاريخ بداية الإيجار مطلوب.',
            'rentStart.date' => 'تاريخ بداية الإيجار يجب أن يكون تاريخاً صحيحاً.',
            'rentEnd.required' => 'تاريخ نهاية الإيجار مطلوب.',
            'rentEnd.date' => 'تاريخ نهاية الإيجار يجب أن يكون تاريخاً صحيحاً.',
            'rentEnd.after' => 'تاريخ نهاية الإيجار يجب أن يكون بعد تاريخ بدايته.',
            'rentValue.required' => 'قيمة الإيجار مطلوبة.',
            'rentValue.numeric' => 'قيمة الإيجار يجب أن تكون رقماً صحيحاً.',
            'contractPDF.mimes' => 'الملف المرفق يجب أن يكون بصيغة PDF.',
            'checkbox.required' => 'حقل الاختيار مطلوب.',
            'checkboxPDF.mimes' => 'ملف الاختيار يجب أن يكون بصيغة PDF.',
            'textArea.string' => 'حقل النص يجب أن يحتوي على نصوص فقط.',
            'done.boolean' => 'حقل الإتمام يجب أن يكون إما صحيحاً أو خطأ.',
            'type.required' => 'النوع مطلوب.',
            'type.string' => 'النوع يجب أن يكون نصاً.',
        ];
    }
}
