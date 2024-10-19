@extends('dashboard.layouts.app')
@section('title', 'تعديل العقد')
@section('content')
    <div class="container-fluid">
        <div class="card mt-30 mb-50">
            <div class="card-header color-dark fw-500">
                <h4 class="text-capitalize">تعديل العقد</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('contracts.update', $contract->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row align-items-end">
                        <h3>بيانات العقد</h3>
                        <br><br>
                        <div class="mb-3 col-lg-4">
                            <label for="buildingNum" class="form-label">رقم العقد <span class="text-danger">*</span></label>
                            <input name="buildingNum" id="buildingNum"
                                class="form-control @error('buildingNum') is-invalid @enderror" type="text"
                                value="{{ $contract->buildingNum }}">
                            @error('buildingNum')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-4">
                            <label for="buildingName" class="form-label">اسم العقار</label>
                            <input name="buildingName" id="buildingName"
                                class="form-control @error('buildingName') is-invalid @enderror" type="text"
                                value="{{ $contract->buildingName }}">
                            @error('buildingName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-4">
                            <label for="buildingType" class="form-label">نوع العقار</label>
                            <select name="buildingType" id="buildingType"
                                class="form-select @error('buildingType') is-invalid @enderror">
                                <option selected disabled>اختر نوع العقار</option>
                                @foreach ($type as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $contract->buildingType == $data->id ? 'selected' : '' }}>{{ $data->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('buildingType')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="projectName" class="form-label">اسم المشروع</label>
                            <input name="projectName" id="projectName"
                                class="form-control @error('projectName') is-invalid @enderror" type="text"
                                value="{{ $contract->projectName }}">
                            @error('projectName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="buildingIn" class="form-label">مكونات العقار</label>
                            <input name="buildingIn" id="buildingIn"
                                class="form-control @error('buildingIn') is-invalid @enderror" type="text"
                                value="{{ $contract->buildingIn }}">
                            @error('buildingIn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="ownerName" class="form-label">اسم المالك</label>
                            <input name="ownerName" id="ownerName"
                                class="form-control @error('ownerName') is-invalid @enderror" type="text"
                                value="{{ $contract->ownerName }}">
                            @error('ownerName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="ownerPhone" class="form-label">هاتف المالك</label>
                            <input name="ownerPhone" id="ownerPhone"
                                class="form-control @error('ownerPhone') is-invalid @enderror" type="text"
                                value="{{ $contract->ownerPhone }}">
                            @error('ownerPhone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="agentName" class="form-label">اسم الوكيل</label>
                            <input name="agentName" id="agentName"
                                class="form-control @error('agentName') is-invalid @enderror" type="text"
                                value="{{ $contract->agentName }}">
                            @error('agentName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="agentPhone" class="form-label">هاتف الوكيل</label>
                            <input name="agentPhone" id="agentPhone"
                                class="form-control @error('agentPhone') is-invalid @enderror" type="text"
                                value="{{ $contract->agentPhone }}">
                            @error('agentPhone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="agencyNum" class="form-label">رقم الوكالة</label>
                            <input name="agencyNum" id="agencyNum"
                                class="form-control @error('agencyNum') is-invalid @enderror" type="text"
                                value="{{ $contract->agencyNum }}">
                            @error('agencyNum')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="agencyDate" class="form-label">تاريخ انتهاء الوكالة</label>
                            <input name="agencyDate" id="agencyDate"
                                class="form-control @error('agencyDate') is-invalid @enderror" type="date"
                                value="{{ $contract->agencyDate }}">
                            @error('agencyDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="city" class="form-label">المنطقة</label>
                            <select name="city" id="city"
                                class="form-select @error('city') is-invalid @enderror">
                                <option selected disabled>اختر المنطقة</option>
                                @foreach ($city as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $contract->city == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                                @endforeach
                            </select>
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="type" class="form-label">صيغة العقد</label>
                            <select name="type" id="type"
                                class="form-select @error('type') is-invalid @enderror">
                                <option selected disabled>اختر صيغة العقد</option>
                                <option value="إلكتروني" {{ $contract->type == 'إلكتروني' ? 'selected' : '' }}>إلكتروني
                                </option>
                                <option value="يدوي" {{ $contract->type == 'يدوي' ? 'selected' : '' }}>يدوي</option>
                            </select>
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr class="my-3">
                        <h3>شروط العقد</h3>
                        <br><br>
                        <div class="mb-3 col-lg-3">
                            <label for="contractType" class="form-label">نوع استخدام العقار</label>
                            <select name="contractType" id="contractType"
                                class="form-select @error('contractType') is-invalid @enderror">
                                <option selected disabled>اختر نوع استخدام العقار</option>
                                @foreach ($detail as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $contract->contractType == $data->id ? 'selected' : '' }}>{{ $data->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('contractType')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="contractTime" class="form-label">مدة العقد</label>
                            <input name="contractTime" id="contractTime"
                                class="form-control @error('contractTime') is-invalid @enderror" type="text"
                                value="{{ $contract->contractTime }}">
                            @error('contractTime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="contractDetails" class="form-label">نظام سداد الدفعات</label>
                            <select name="contractDetails" id="contractDetails"
                                class="form-select @error('contractDetails') is-invalid @enderror">
                                <option selected disabled>اختر نظام سداد الدفعات</option>
                                @foreach ($time as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $contract->contractDetails == $data->id ? 'selected' : '' }}>{{ $data->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('contractDetails')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="contractValue" class="form-label">قيمة العقد </label>
                            <input name="contractValue" id="contractValue"
                                class="form-control @error('contractValue') is-invalid @enderror" type="text"
                                value="{{ $contract->contractValue }}">
                            @error('contractValue')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="contractStart" class="form-label">تاريخ بداية العقد </label>
                            <input name="contractStart" id="contractStart"
                                class="form-control @error('contractStart') is-invalid @enderror" type="date"
                                value="{{ $contract->contractStart }}">
                            @error('contractStart')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="contractEnd" class="form-label">تاريخ نهاية العقد </label>
                            <input name="contractEnd" id="contractEnd"
                                class="form-control @error('contractEnd') is-invalid @enderror" type="date"
                                value="{{ $contract->contractEnd }}">
                            @error('contractEnd')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="rentStart" class="form-label">بداية الفترة الايجارية </label>
                            <input name="rentStart" id="rentStart"
                                class="form-control @error('rentStart') is-invalid @enderror" type="date"
                                value="{{ $contract->rentStart }}">
                            @error('rentStart')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="rentEnd" class="form-label">نهاية الفترة الايجارية </label>
                            <input name="rentEnd" id="rentEnd"
                                class="form-control @error('rentEnd') is-invalid @enderror" type="date"
                                value="{{ $contract->rentEnd }}">
                            @error('rentEnd')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="rentValue" class="form-label">قيمة الفترة الايجارية </label>
                            <input name="rentValue" id="rentValue"
                                class="form-control @error('rentValue') is-invalid @enderror" type="text"
                                value="{{ $contract->rentValue }}">
                            @error('rentValue')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="rentTime" class="form-label">مدة الفترة الايجارية</label>
                            <input name="rentTime" id="rentTime"
                                class="form-control @error('rentTime') is-invalid @enderror" type="text"
                                value="{{ $contract->rentTime }}">
                            @error('rentTime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="contractPDF" class="form-label">صوره العقد</label>
                            <input name="contractPDF" id="file"
                                class="form-control @error('contractPDF') is-invalid @enderror" type="file">
                            @error('contractPDF')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="checkboxPDF" class="form-label">صوره الرخصة</label>
                            <input name="checkboxPDF" id="checkboxPDF"
                                class="form-control @error('checkboxPDF') is-invalid @enderror" type="file">
                            @error('checkboxPDF')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-3">
                            <label for="formFile" class="form-label">حالة العقد</label>
                            <select name="done" class="form-select" aria-label="Default select example">
                                <option value="0" @if($contract->done == 0) selected @endif>قيد العمل</option>
                                <option value="1" @if($contract->done == 1) selected @endif>تم تسليم العقار</option>
                            </select>
                        </div>
                        <div class="mb-3 col-lg-3">
                            <input class="form-check-input" name="checkbox" value="نعم" type="checkbox"
                                id="flexCheckDefault" {{ $contract->checkbox == 'نعم' ? 'checked' : '' }}>
                            <label class="form-label pr-5" for="flexCheckDefault">
                                العقار مرخص سكن جماعي للافراد
                            </label>
                        </div>

                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">تحديث العقد</button>
                </form>
            </div>
        </div>
    </div>
@endsection
