@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center py-4">
            <div class="table-responsivee">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>تعديل العقد رقم : {{ $drive->buildingNum }}</h2>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('contract.update', $drive->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="text-center p-1 border-bottom">
                            <h3>بيانات العقد</h3>
                        </div>
                        <div class="row py-2 ">
                            <div class="mb-3 col-lg-4">
                                <label for="formFile" class="form-label">رقم العقد</label>
                                <input name="buildingNum" class="form-control" type="text"
                                    value="{{ $drive->buildingNum }}">
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label for="formFileMultiple" class="form-label">اسم العقار</label>
                                <input name="buildingName" class="form-control" type="text"
                                    value="{{ $drive->buildingName }}">
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label for="formFile" class="form-label">نوع العقار</label>
                                <select name="buildingType" class="form-select" aria-label="Default select example">
                                    <option selected disabled>اختر نوع العقار</option>
                                    @foreach ($type as $data)
                                        <option value="{{ $drive->buildingType }}" selected>{{ $drive->buildingType }}
                                        </option>
                                        <option value="{{ $data->name }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label for="formFileDisabled" class="form-label">اسم المشروع</label>
                                <input name="projectName" class="form-control" type="text"
                                    value="{{ $drive->projectName }}">
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="formFile" class="form-label">المدينة</label>
                                <select name="city" class="form-select" aria-label="Default select example">
                                    <option selected disabled>اختر المدينة</option>
                                    @foreach ($city as $data)
                                        <option value="{{ $drive->city }}" selected>{{ $drive->city }}</option>
                                        <option value="{{ $data->name }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="formFileMultiple" class="form-label">مكونات العقار</label>
                                <input name="buildingIn" class="form-control" type="text"
                                    value="{{ $drive->buildingIn }}">
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="formFileDisabled" class="form-label">اسم المالك</label>
                                <input name="ownerName" class="form-control" type="text"
                                    value="{{ $drive->ownerName }}">
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="formFile" class="form-label">هاتف المالك</label>
                                <input name="ownerPhone" class="form-control" type="text"
                                    value="{{ $drive->ownerPhone }}">
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="formFileMultiple" class="form-label">اسم الوكيل</label>
                                <input name="agentName" class="form-control" type="text"
                                    value="{{ $drive->agentName }}">
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="formFileDisabled" class="form-label">هاتف الوكيل</label>
                                <input name="agentPhone" class="form-control" type="text"
                                    value="{{ $drive->agentPhone }}">
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="formFile" class="form-label">رقم الوكالة</label>
                                <input name="agencyNum" class="form-control" type="text"
                                    value="{{ $drive->agencyNum }}">
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="formFile" class="form-label">تاريخ انتهاء الوكالة</label>
                                <input name="agencyDate" class="form-control" type="date"
                                    value="{{ $drive->agencyDate }}">
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="formFileMultiple" class="form-label">اسم الوسيط</label>
                                <input name="mediatorName" class="form-control" type="text"
                                    value="{{ $drive->mediatorName }}">
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="formFileDisabled" class="form-label">هاتف الوسيط</label>
                                <input name="mediatorPhone" class="form-control" type="text"
                                    value="{{ $drive->mediatorPhone }}">
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="formFile" class="form-label">مراقب السكن</label>
                                <input name="Administrator" class="form-control" type="text"
                                    value="{{ $drive->Administrator }}">
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="formFile" class="form-label">هاتف مراقب السكن</label>
                                <input name="AdministratorPhone" class="form-control" type="text"
                                    value="{{ $drive->AdministratorPhone }}">
                            </div>
                        </div>
                        <div class="text-center py-2 pt-3 border-top border-bottom">
                            <h3>شروط العقد</h3>
                        </div>
                        <div class="row py-2">
                            <div class="mb-3 col-lg-3">
                                <label for="formFile" class="form-label">نوع العقد</label>
                                <select name="contractType" class="form-select" aria-label="Default select example">
                                    <option selected disabled>اختر نوع العقد</option>
                                    @foreach ($detail as $data)
                                        <option value="{{ $drive->contractType }}" selected>{{ $drive->contractType }}
                                        </option>
                                        <option value="{{ $data->name }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="formFileDisabled" class="form-label">مدة العقد</label>
                                <input name="contractTime" class="form-control" type="text"
                                    value="{{ $drive->contractTime }}">
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="formFile" class="form-label">تفاصيل العقد</label>
                                <select name="contractDetails" class="form-select" aria-label="Default select example">
                                    <option selected disabled>اختر مدة العقد</option>
                                    @foreach ($time as $data)
                                        <option value="{{ $drive->contractDetails }}" selected>
                                            {{ $drive->contractDetails }}</option>
                                        <option value="{{ $data->name }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="formFile" class="form-label">قيمة العقد</label>
                                <input name="contractValue" class="form-control" type="text"
                                    value="{{ $drive->contractValue }}">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="formFile" class="form-label">تاريخ بداية العقد</label>
                                <input name="contractStart" class="form-control" type="date" id="newDate"
                                    value="{{ $drive->contractStart }}">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="formFile" class="form-label">تاريخ نهاية العقد</label>
                                <input name="contractEnd" class="form-control" type="date"
                                    value="{{ $drive->contractEnd }}">
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label for="formFile" class="form-label">تغير صوره العقد</label>
                                <input name="file" class="form-control" type="file">
                            </div>
                            <div class="mb-3 col-lg-12">
                                <input class="form-check-input " name="checkbox" value="نعم"
                                    @if ($drive->checkbox != null) checked @endif type="checkbox"
                                    id="flexCheckDefault">
                                <label class="form-label pr-4" for="flexCheckDefault">
                                    العقار مرخص سكن جماعي للافراد
                                </label>
                                <br>
                                @if ($drive->checkbox == null)
                                    <label for="formFile" class="form-label">  صوره الرخصة  </label>
                                    <input name="fileTwo" class="form-control" type="file">
                                @endif
                            </div>
                        </div>
                        <div class="py-3 border-top">
                            <button type="submit" class="btn btn-warning w-100">تعديل بيانات العقد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
