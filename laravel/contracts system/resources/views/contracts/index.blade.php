{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-4">
        <div class="container-xl">
            <div class="table-responsivee">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>العقود المسجلة</h2>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end">
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th>رقم العقد</th>
                                <th>اسم المشروع</th>
                                <th>المدينة</th>
                                <th>تفاصيل العقد</th>
                                <th>نوع العقد</th>
                                <th>تاريخ بداية العقد</th>
                                <th>تفاصيل العقد</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contracts as $item)
                            <tr>
                                <td>{{ $item->buildingNum }}</td>
                                <td>{{ $item->projectName }}</td>
                                <td>{{ $item->city }}</td>
                                <td>{{ $item->contractDetails }}</td>
                                <td>{{ $item->contractType }}</td>
                                <td>{{ $item->contractStart }}</td>
                                <td>
                                    <a href="{{ route('contract.show', $item->id) }}" class="Settings" ><i class="material-icons">&#xe8f4;</i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="clearfix">
                        <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                        <ul class="pagination">
                            <li class="page-item disabled"><a href="#">Previous</a></li>
                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item active"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">4</a></li>
                            <li class="page-item"><a href="#" class="page-link">5</a></li>
                            <li class="page-item"><a href="#" class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
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
                                <form action="{{ route('contract.search') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row py-2 ">
                                        <div class="mb-3 col-lg-12">
                                            <label for="formFile" class="form-label">رقم العقد</label>
                                            <select name="buildingNum" class="form-select fares"
                                                aria-label="Default select example" dir="rtl">
                                                <option selected disabled>اختر رقم العقد</option>
                                                @foreach ($contract as $data)
                                                    <option value="{{ $data->buildingNum }}">{{ $data->buildingNum }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
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
                                                    <h2>العقود المسجلة</h2>
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
                                                    <th>اسم المشروع</th>
                                                    <th>المدينة</th>
                                                    <th>تفاصيل العقد</th>
                                                    <th>نوع العقد</th>
                                                    <th>تاريخ بداية العقد</th>
                                                    <th>تفاصيل العقد</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($contracts as $item)
                                                    <tr>
                                                        <td>{{ $item->buildingNum }}</td>
                                                        <td>{{ $item->projectName }}</td>
                                                        <td>{{ $item->city }}</td>
                                                        <td>{{ $item->contractDetails }}</td>
                                                        <td>{{ $item->contractType }}</td>
                                                        <td>{{ $item->contractStart }}</td>
                                                        <td>
                                                            <a href="{{ route('contract.show', $item->id) }}"
                                                                class="Settings"><i class="material-icons">&#xe8f4;</i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
                                                {{ $contracts->links() }}
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
