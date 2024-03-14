@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="w-50 m-auto">
            @if (Session::has('done'))
                <div class="alert alert-success alert-dismissible py-3" role="alert">
                    <div class="d-flex">
                        <div>
                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                        </div>
                        <div>
                            تم اضافة البيانات الجديدة بنجاح
                        </div>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            @endif
            @if (Session::has('remove'))
                <div class="alert alert-danger alert-dismissible py-3" role="alert">
                    <div class="d-flex">
                        <div>
                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                        </div>
                        <div>
                            تم حذف البيانات بنجاح
                        </div>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            @endif
            @if (Session::has('donee'))
                <div class="alert alert-success alert-dismissible py-3" role="alert">
                    <div class="d-flex">
                        <div>
                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                        </div>
                        <div>
                            تم التعديل بنجاح
                        </div>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-home-5" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                                role="tab" tabindex="-1">المقر</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-home-4" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                                role="tab" tabindex="-1">المدينة</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-home-3" class="nav-link" data-bs-toggle="tab" aria-selected="false"
                                role="tab" tabindex="-1">شهر الاشتراك</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-profile-5" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                                role="tab">قاعدة البيانات</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane" id="tabs-home-5" role="tabpanel">
                            <form action="{{ route('location.store') }}" class="card card-md" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <h2 class="card-title text-center mb-4">اضافة مقر جديد</h2>
                                    <div class="mb-3">
                                        <label class="form-label">اسم المقر</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">اسم المدينة التابع لها</label>
                                        <Select class="form-select @error('city') is-invalid @enderror" name="city">
                                            <option selected disabled>اختر اسم المدينة</option>
                                            @foreach ($city as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </Select>
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary w-100 load">تسجيل</button>
                                    </div>
                                </div>
                            </form>
                            <div class="card my-3">
                                <div class="card-body border-bottom">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <h3 class="card-title m-0">كل المقرات المسجلة</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive text-center">
                                    <table class="table card-table table-vcenter text-nowrap datatable">
                                        <thead>
                                            <tr>
                                                <th>اسم المقر</th>
                                                <th>اسم المدينة التابع لها</th>
                                                <th>حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($location as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->city }}</td>
                                                    <td>
                                                        <a href="{{ route('location.destroy', $item->id) }}"><span
                                                                class="btn btn-danger">
                                                                delete
                                                            </span></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center " dir="ltr" id="pag">
                                    {{ $location->links() }}
                                </div>
                                <style>
                                    #pag {
                                        position: relative;
                                    }

                                    #pag nav div:last-child div:last-child {
                                        display: none;
                                    }

                                    #pag nav div:last-child {
                                        position: absolute;
                                        top: 19px;
                                        left: calc(50% - (232.300px/2));
                                    }

                                    #pag nav div:last-child span {
                                        margin: 0px 5px
                                    }
                                </style>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-home-4" role="tabpanel">
                            <form action="{{ route('city.store') }}" class="card card-md" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <h2 class="card-title text-center mb-4">اضافة مدينة جديدة</h2>
                                    <div class="mb-3">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary w-100 load">تسجيل</button>
                                    </div>
                                </div>
                            </form>
                            <div class="card my-3">
                                <div class="card-body border-bottom">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <h3 class="card-title m-0">كل المدن المسجلة</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive text-center">
                                    <table class="table card-table table-vcenter text-nowrap datatable">
                                        <thead>
                                            <tr>
                                                <th>اسم المدينة</th>
                                                <th>حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($city as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>
                                                        <a href="{{ route('city.destroy', $item->id) }}"><span
                                                                class="btn btn-danger">
                                                                delete
                                                            </span></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center " dir="ltr" id="pag">
                                    {{ $city->links() }}
                                </div>
                                <style>
                                    #pag {
                                        position: relative;
                                    }

                                    #pag nav div:last-child div:last-child {
                                        display: none;
                                    }

                                    #pag nav div:last-child {
                                        position: absolute;
                                        top: 19px;
                                        left: calc(50% - (232.300px/2));
                                    }

                                    #pag nav div:last-child span {
                                        margin: 0px 5px
                                    }
                                </style>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-home-3" role="tabpanel">
                            <form action="{{ route('date.update') }}" class="card card-md" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <h2 class="card-title text-center mb-4">شهر الاشتراك</h2>
                                    <div class="mb-3">
                                        <input type="text" class="form-control @error('date') is-invalid @enderror"
                                            name="date" value="{{ $date->date }}" autofocus>
                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-warning w-100 load">تعديل</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane active show" id="tabs-profile-5" role="tabpanel">
                            <form action="{{ route('data.import') }}" class="card card-md" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <h2 class="card-title text-center mb-4">قاعدة البيانات</h2>
                                    <div class="mb-3">
                                        <input type="file" class="form-control @error('file') is-invalid @enderror"
                                            name="file" value="{{ old('file') }}" autofocus>
                                        @error('file')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary w-100 load">تسجيل</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
