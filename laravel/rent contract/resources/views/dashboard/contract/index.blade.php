@extends('dashboard.layouts.app')
@section('title', 'العقود المسجلة')

@section('content')

    <div class="container-fluid">
        <div class="card mt-30 mb-50">
            <div class="card-header color-dark fw-500">
                <h4 class="text-capitalize"> العقود المسجلة </h4>
                <div class="d-flex" style="gap: 20px">
                    <a style="float: right" href="{{ route('contracts.create') }}" class="btn btn-primary">اضافة عقد جديد </a>
                    <button style="float: right" id="btnExport" class="btn btn-primary d-inline-block mx-3">
                        استخراج البيانات
                    </button>
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item border-0">
                    <h2 class="accordion-header border-bottom">
                        <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h4>
                                فلتر البحث
                            </h4>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse border-0" data-bs-parent="#accordionExample">
                        <div class="accordion-body border-0">
                            <form action="{{ route('contracts.search') }}" method="post">
                                @csrf
                                <div class="row px-1 pb-3 border-bottom">
                                    <div class="mb-3 col-lg-3">
                                        <label for="formFile" class="form-label">نوع العقد</label>
                                        <select name="contractType" class="form-select fares"
                                            aria-label="Default select example" dir="rtl">
                                            <option selected disabled>اختر نوع العقد</option>
                                            @foreach (App\Models\Detail::all() as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ isset($contractType) && $data->id == $contractType ? 'selected' : '' }}>
                                                    {{ $data->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-lg-3">
                                        <label for="formFile" class="form-label">المدينة</label>
                                        <select name="city" class="form-select fares" aria-label="Default select example"
                                            dir="rtl">
                                            <option selected disabled>اختر المدينة</option>
                                            @foreach (App\Models\City::all() as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ isset($city) && $data->id == $city ? 'selected' : '' }}>
                                                    {{ $data->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-lg-3">
                                        <label for="formFile" class="form-label">سريان العقد</label>
                                        <select name="type" class="form-select fares" aria-label="Default select example"
                                            dir="rtl">
                                            <option selected disabled>اختر حالة سريان العقد</option>
                                            <option value="0" {{ isset($type) && 0 == $type ? 'selected' : '' }}>عقد
                                                ساري</option>
                                            <option value="1" {{ isset($type) && 1 == $type ? 'selected' : '' }}>عقد
                                                منتهي</option>
                                            <option value="2" {{ isset($type) && 2 == $type ? 'selected' : '' }}>فترة
                                                ايجارية منتهيه</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-lg-3">
                                        <label for="formFile" class="form-label">حالة العقار</label>
                                        <select name="done" class="form-select fares" aria-label="Default select example"
                                            dir="rtl">
                                            <option selected disabled>اختر حالة العقار</option>
                                            <option value="0" {{ isset($done) && 0 == $done ? 'selected' : '' }}>قيد
                                                العمل</option>
                                            <option value="1" {{ isset($done) && 1 == $done ? 'selected' : '' }}>تم
                                                التسليم</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary">بحث </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="userDatatable global-shadow border-light-0 w-100">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped nowrap">
                            <thead>
                                <tr style="text-align-last: center;" class="userDatatable-header">
                                    <th>#</th>
                                    <th>رقم العقد</th>
                                    <th>اسم المالك</th>
                                    <th>اسم المشروع</th>
                                    <th>المدينة</th>
                                    <th>تفاصيل العقد</th>
                                    <th>نوع العقد</th>
                                    <th>تاريخ بداية العقد</th>
                                    <th>تاريخ نهاية العقد</th>
                                    <th>بداية الفترة الايجارية</th>
                                    <th>نهاية الفترة الايجارية</th>
                                    <th>الاجراءات</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center">
                                @foreach ($contracts as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ route('contracts.show', $item->id) }}">
                                                {{ $item->buildingNum }}
                                            </a>
                                        </td>
                                        <td>{{ $item->ownerName }}</td>
                                        <td>{{ $item->projectName }}</td>
                                        <td>{{ $item->city_name?->name }}</td>
                                        <td>{{ $item->time?->name }}</td>
                                        <td>{{ $item->details?->name }}</td>
                                        <td>{{ $item->contractStart }}</td>
                                        <td>{{ $item->contractEnd }}</td>
                                        <td>{{ $item->rentStart }}</td>
                                        <td>{{ $item->rentEnd }}</td>
                                        <td>
                                            <a style="display: inline-block ;padding: 5px"
                                                href="{{ route('contracts.edit', $item->id) }}"><span
                                                    class="mynaui--edit-one"></span></a>
                                            <form style="display: inline-block ;padding: 5px" class="deleteForm"
                                                method="post" action="{{ route('contracts.destroy', $item->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <a type="button"
                                                    style="display: inline-block;background: none;border: none"
                                                    class="deleteButton">
                                                    <span class="fluent--delete-48-regular"></span>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#btnExport").click(function() {
                let dataArray = @json($contracts);
                let arabicKeys = {
                    "buildingNum": "رقم العقد",
                    "ownerName": "اسم المالك",
                    "buildingName": "اسم العقار",
                    "projectName": "اسم المشروع",
                    "buildingType": "نوع المبنى",
                    "contractType": "نوع العقد",
                    "contractTime": "مدة العقد",
                    "contractDetails": "تفاصيل العقد",
                    "contractStart": "تاريخ بداية العقد",
                    "contractEnd": "تاريخ نهاية العقد",
                    "contractValue": "قيمة العقد",
                    "rentStart": "تاريخ بداية الفترة الايجارية",
                    "rentEnd": "تاريخ نهاية الفترة الايجارية",
                    "rentTime": "مدة الفترة الايجارية",
                    "rentValue": "قيمة الفترة الايجارية",
                    "city": "المدينة",
                    "type": "صيغة العقد",
                    "done": "حالة العقد",
                };
                let selectedKeys = Object.keys(arabicKeys);
                let arabicHeaders = selectedKeys.map(key => arabicKeys[key]);
                let excelData = [];
                excelData.push(arabicHeaders);
                dataArray.forEach(function(item) {
                    let row = selectedKeys.map(key => item[key]);
                    row[17] = (row[17] == 0) ?  'قيد العمل' : 'تم التسليم';
                    excelData.push(row);
                });
                let wb = XLSX.utils.book_new();
                let ws = XLSX.utils.aoa_to_sheet(excelData);
                XLSX.utils.book_append_sheet(wb, ws, "Contracts");
                XLSX.writeFile(wb, "export.xlsx");
            });
        });
    </script>
@endsection
