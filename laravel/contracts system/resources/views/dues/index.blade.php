@extends('layouts.app')

@section('content')
    <div class="page-wrapper py-4">
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="row g-0">
                        <div class=" col-lg-2 border-left">
                            <div class="card-body">
                                <h4 class="subheader">بحث</h4>
                                <form action="{{ route('due.search') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row py-2 ">
                                        <div class="mb-3 col-lg-12">
                                            <label for="formFile" class="form-label">نوع العقد</label>
                                            <select name="contractType" class="form-select fares"
                                                aria-label="Default select example" dir="rtl">
                                                <option selected disabled>اختر نوع العقد</option>
                                                @foreach ($time as $data)
                                                    <option value="{{ $data->name }}">{{ $data->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            <label for="formFile" class="form-label">المدينة</label>
                                            <select name="city" class="form-select fares"
                                                aria-label="Default select example" dir="rtl">
                                                <option selected disabled>اختر المدينة</option>
                                                @foreach ($cities as $data)
                                                    <option value="{{ $data->name }}">{{ $data->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            <label for="formFile" class="form-label">سداد بالكامل</label>
                                            <select name="pay" class="form-select fares"
                                                aria-label="Default select example" dir="rtl">
                                                <option selected disabled>نعم \ لا</option>
                                                <option value="1">نعم</option>
                                                <option value="2">لا</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            <label for="formFile" class="form-label">تاريخ الاستحقاق</label>
                                            <br>
                                            <label for="formFile" class="form-label">من</label>
                                            <input name="from" class="form-control" type="date">
                                            <label for="formFile" class="form-label">الي</label>
                                            <input name="to" class="form-control" type="date">
                                        </div>
                                    </div>
                                    <div class="py-3 border-top">
                                        <button type="submit" class="btn btn-primary w-100">بحث </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class=" col-lg-10 d-flex flex-column">
                            <div class="card-body">
                                <div class="table-responsivee">
                                    <div class="table-wrapper3">
                                        <div class="table-title">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h2>الاستحقاقات المسجلة</h2>
                                                </div>
                                                <div class="col-sm-6 d-flex justify-content-end">
                                                    <a href="{{ route('due.export') }}" class="btn btn-success" data-toggle="modal"><i
                                                        class="material-icons">&#xe873;</i> <span>تحميل excel sheet</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th>رقم العقد</th>
                                                    <th>تاريخ الاستحقاق</th>
                                                    <th>القسط المستحق</th>
                                                    <th>المسدد</th>
                                                    <th>المتبقي</th>
                                                    <th>سداد الكامل</th>
                                                    <th>بيان</th>
                                                    <th>PDF</th>
                                                    <th>تعديل</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <div class="d-none">
                                                    {{ $x = count($dues) }}
                                                </div>
                                                @for ($i = 0; $i < $x; $i++)
                                                    <tr>
                                                        <td>{{ $dues[$i]->contractNum }}</td>
                                                        <td>{{ $dues[$i]->dueDate }}</td>
                                                        <td id="tdThree{{ $i }}">{{ $dues[$i]->dueInstallment }}
                                                        </td>
                                                        @if ($dues[$i]->pay == null)
                                                            <td id="tdOne{{ $i }}">0.00</td>
                                                        @else
                                                            <td id="tdOne{{ $i }}">{{ $dues[$i]->pay }}</td>
                                                        @endif
                                                        <td>
                                                            {{ $dues[$i]->dueInstallment - $dues[$i]->pay }}</td>
                                                        <td id="tdTwo{{ $i }}"></td>
                                                        @if ($dues[$i]->dueData == null)
                                                            <td>....</td>
                                                        @else
                                                            <td>{{ $dues[$i]->dueData }}</td>
                                                        @endif
                                                        @if ($dues[$i]->duePdf != null)
                                                            <td>
                                                                <a href="{{ route('due.download', $dues[$i]->id) }}"
                                                                    class="setting"><i
                                                                        class="material-icons">&#xf090;</i></a>
                                                            </td>
                                                        @else
                                                            <td>....</td>
                                                        @endif
                                                        <td>
                                                            <a href="{{ route('due.edit', $dues[$i]->id) }}"
                                                                class="edit"><i class="material-icons">&#xe8b8;</i></a>
                                                        </td>
                                                    </tr>
                                                @endfor
                                                <script>
                                                    x = {{ count($dues) }};
                                                    for (let i = 0; i < x; i++) {
                                                        z = $(`#tdOne${i}`).text();
                                                        f = $(`#tdThree${i}`).text();
                                                        if (f - z == 0) {
                                                            document.getElementById(`tdTwo${i}`).innerHTML = "نعم";
                                                        } else {
                                                            document.getElementById(`tdTwo${i}`).innerHTML = "لا";
                                                        }
                                                    }
                                                </script>
                                            </tbody>
                                        </table>
                                        <style>
                                            .hidden div {
                                                display: none;
                                            }

                                            .relative {
                                                text-decoration: none;
                                            }
                                        </style>
                                        @if ($fares == 1)
                                            <div class="text-center pt-3 justfy-content-center  " dir="ltr">
                                                {{ $dues->links() }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.fares').select2();
        });
    </script>
@endsection
