@extends('layouts.app')

@section('content')
    <div class="page-wrapper py-4">
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-12 col-md-3 border-left">
                            <div class="card-body">
                                <h4 class="subheader">الاعدادات</h4>
                                <div class="list-group">
                                    <a href="{{ route('setting.city') }}"
                                        class="list-group-item list-group-item-action d-flex align-items-center">
                                        المدن
                                    </a>
                                    <a href="{{ route('setting.detail') }}"
                                        class="list-group-item list-group-item-action d-flex align-items-center active">
                                        نوع العقد
                                    </a>
                                    <a href="{{ route('setting.time') }}"
                                        class="list-group-item list-group-item-action d-flex align-items-center">
                                        تفاصيل العقد
                                    </a>
                                    <a href="{{ route('setting.type') }}"
                                        class="list-group-item list-group-item-action d-flex align-items-center">
                                        نوع العقار
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-9 d-flex flex-column">
                            <div class="card-body">
                                <h3 class=" border-bottom pb-2">
                                    اضافة نوع عقد جديد جديدة
                                </h3>
                                <form action="{{ route('detail.store') }}">
                                    @csrf
                                    <div id="app" class="row">
                                        <div class="mb-3 col-lg-6">
                                            <label class="form-label">نوع العقد</label>
                                            <input name="name" class="form-control" placeholder="نوع العقد" type="text">
                                        </div>
                                        <div class="mb-3 col-lg-3">
                                            <label class="form-label invisible">اسم المدينة</label>
                                            <button type="submit" class="btn btn-primary w-100">تسجيل </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="table-responsivee">
                                    <div class="table-wrapper3">
                                        <div class="table-title">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h2>كل انواع العقد المسجلة</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th>نوع العقد</th>
                                                    <th>حذف</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($details as $item)
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        <td>
                                                            {{-- <a href="{{ route('contract.show', $item->id) }}" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a> --}}
                                                            <a onclick="return confirm('are you sure!')" href="{{ route('detail.destroy', $item->id) }}" class="delete" ><i class="material-icons">&#xe872;</i></a>
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
                </div>
            </div>
        </div>
    </div>
@endsection