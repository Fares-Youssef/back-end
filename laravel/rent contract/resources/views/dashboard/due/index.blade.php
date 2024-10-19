@extends('dashboard.layouts.app')
@section('title', 'الاستحقاقات')

@section('content')
    <script src="https://code.highcharts.com/maps/highmaps.js"></script>
    <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/maps/modules/data.js"></script>
    <script src="https://code.highcharts.com/maps/modules/accessibility.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"
        integrity="sha512-mh+AjlD3nxImTUGisMpHXW03gE6F4WdQyvuFRkjecwuWLwD2yCijw4tKA3NsEFpA1C3neiKhGXPSIGSfCYPMlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="container-fluid">
        <div class="card mt-30 mb-50">
            <div class="card-header color-dark fw-500">
                <h4 class="text-capitalize"> الاستحقاقات </h4>
                <div class="d-flex" style="gap: 20px">
                    <a style="float: right" href="{{ route('due.create') }}" class="btn btn-primary">اضافة استحقاق جديد </a>
                    <button style="float: right" id="btnExport" class="btn btn-primary d-inline-block mx-3">
                        طباعة البيانات
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
                            <form action="{{ route('due.search') }}" method="post">
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
                                        <label for="formFile" class="form-label">سداد بالكامل</label>
                                        <select name="pay" class="form-select fares" aria-label="Default select example"
                                            dir="rtl">
                                            <option selected disabled>اختر حالة السداد</option>
                                            <option value="1" {{ isset($pay) && 1 == $pay ? 'selected' : '' }}>نعم
                                            </option>
                                            <option value="2" {{ isset($pay) && 2 == $pay ? 'selected' : '' }}>لا
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-lg-3 ">
                                        <label for="formFile" class="form-label">المدة</label>
                                        <div class="position-relative">
                                            <input type="text" name="date" readonly id="config-demo"
                                                class="form-control bg-white">
                                            <i class="uil uil-schedule position-absolute"
                                                style="left: 30px; top: 50%; transform: translateY(-50%);"></i>
                                        </div>
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
                        <table id="example" class="table table-striped nowrap" style="width:100%">
                            <thead>
                                <tr style="text-align-last: center;" class="userDatatable-header">
                                    <th>#</th>
                                    <th>رقم العقد</th>
                                    <th>اسم العقار</th>
                                    <th>اسم المالك</th>
                                    <th>تاريخ الاستحقاق</th>
                                    <th>القسط المستحق</th>
                                    <th>المسدد</th>
                                    <th>المتبقي</th>
                                    <th>سداد الكامل</th>
                                    <th>بيان</th>
                                    <th>PDF</th>
                                    <th>الاجراءات</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center">
                                @foreach ($dues as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ route('contracts.show', $item->contract->id) }}">
                                                {{ $item->contract->buildingNum }}
                                            </a>
                                        </td>
                                        <td>{{ $item->contract?->buildingName }}</td>
                                        <td>{{ $item->contract?->ownerName }}</td>
                                        <td>{{ $item->dueDate }}</td>
                                        <td>{{ $item->dueInstallment }}</td>
                                        <td>{{ $item->pay }}</td>
                                        <td>{{ $item->dueInstallment - $item->pay }}</td>
                                        <td>{{ $item->dueInstallment - $item->pay == 0 ? 'نعم' : 'لا' }}</td>
                                        @if ($item->dueData == null)
                                            <td>....</td>
                                        @else
                                            <td>{{ $item->dueData }}</td>
                                        @endif
                                        @if ($item->duePdf != null)
                                            <td>
                                                <a href="{{ route('download', [$item->id, 'due']) }}" class="setting fs-4">
                                                    <i class="uil uil-arrow-circle-down"></i> </a>
                                            </td>
                                        @else
                                            <td>....</td>
                                        @endif
                                        <td>
                                            <a style="display: inline-block ;padding: 5px"
                                                href="{{ route('due.edit', $item->id) }}"><span
                                                    class="mynaui--edit-one"></span></a>
                                            <form style="display: inline-block ;padding: 5px" class="deleteForm"
                                                method="post" action="{{ route('due.destroy', $item->id) }}">
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

    <div class="d-none my-5" id="printableArea">
        <table class="table table-striped table-hover text-center   ">
            <thead>
                <tr>
                    <th>رقم العقد</th>
                    <th>اسم المالك</th>
                    <th>اسم العقار</th>
                    <th>تاريخ الاستحقاق</th>
                    <th>القسط المستحق</th>
                    <th>بيان</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dues as $item)
                    <tr>
                        <td>{{ $item->contractNum }}</td>
                        <td>{{ $item->contract?->ownerName }}</td>
                        <td>{{ $item->contract?->buildingName }}</td>
                        <td>{{ $item->dueDate }}</td>
                        <td>{{ $item->dueInstallment }}</td>
                        <td>{{ $item->dueData }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $("#btnExport").click(function() {
                var printContents = document.getElementById('printableArea').innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            });
        });
        $('#config-demo').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD',
                applyLabel: 'تطبيق',
                cancelLabel: 'إلغاء',
                fromLabel: 'من',
                toLabel: 'إلى',
                customRangeLabel: 'تحديد نطاق',
                weekLabel: 'أسبوع',
                daysOfWeek: ['أحد', 'إثنين', 'ثلاثاء', 'أربعاء', 'خميس', 'جمعة', 'سبت'],
                monthNames: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر',
                    'أكتوبر', 'نوفمبر', 'ديسمبر'
                ],
                firstDay: 6
            },
            @if (isset($dateRange) && is_array($dateRange) && count($dateRange) === 2)
                startDate: '{{ $dateRange[0] }}',
                endDate: '{{ $dateRange[1] }}',
            @endif
        });
    </script>
@endsection
