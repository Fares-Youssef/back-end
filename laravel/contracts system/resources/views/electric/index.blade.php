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
                                <form action="{{ route('water.search') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row py-2 ">
                                        <div class="mb-3 col-lg-12">
                                            <label for="formFile" class="form-label">رقم العقد</label>
                                            <select name="contractNum" class="form-select fares"
                                                aria-label="Default select example" dir="rtl">
                                                <option selected disabled>اختر نوع العقد</option>
                                                @foreach ($contracts as $data)
                                                    <option value="{{ $data->buildingNum }}">{{ $data->buildingNum }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            <label for="formFile" class="form-label">اسم العقار</label>
                                            <select name="contractName" class="form-select fares"
                                                aria-label="Default select example" dir="rtl">
                                                <option selected disabled>اختر المدينة</option>
                                                @foreach ($contracts as $data)
                                                    <option value="{{ $data->buildingName }}">{{ $data->buildingName }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="py-3 border-top">
                                        <button type="submit" class="btn btn-primary w-100">بحث</button>
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
                                                    <h2>فواتير الكهرباء</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th>رقم العقد</th>
                                                    <th>الفترة من</th>
                                                    <th>الفتة الي</th>
                                                    <th>القيمة</th>
                                                    <th>PDF</th>
                                                    <th>حذف</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($waters as $item)
                                                    <tr>
                                                        <td>{{ $item->contractNum }}</td>
                                                        <td>{{ $item->start }}</td>
                                                        <td>{{ $item->end }}</td>
                                                        <td>{{ $item->value }}</td>
                                                        @if ($item->PDF != null)
                                                            <td>
                                                                <a href="{{ route('electric.download', $item->id) }}"
                                                                    class="setting"><i
                                                                        class="material-icons">&#xf090;</i></a>
                                                            </td>
                                                        @else
                                                            <td>....</td>
                                                        @endif
                                                        <td><a onclick="return confirm('are you sure!')"
                                                                href="{{ route('electric.destroy', $item->id) }}"
                                                                class="delete"><i class="material-icons">&#xe872;</i></a>
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
                                                {{ $waters->links() }}
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
