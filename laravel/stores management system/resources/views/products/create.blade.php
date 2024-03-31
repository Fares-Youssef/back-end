@extends('layouts.app')

@section('content')
    <div class="container container-tight py-5">
        <div class="m-auto">
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
                            تمت العملية بنجاح
                        </div>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            @endif
            @if (Session::has('remove'))
                <div class="alert alert-danger alert-dismissible py-3" role="alert">
                    <div class="d-flex">
                        <div>
                            لا تستطيع الحذف
                        </div>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            @endif
            <form action="{{ route('product.store') }}" class="card card-md" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">تسجيل منتج جديد</h2>
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">اسم المنتج</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">تسجيل</button>
                    </div>
                </div>
            </form>
            <div class="card my-3">
                <div class="card-body border-bottom">
                    <div class="row">
                        <div class="col">
                            <h3 class="card-title m-0">كل المنتجات المسجلة</h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive text-center">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th>اسم المنتج</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $item->id) }}" class="btn btn-warning">
                                            تعديل
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('product.destroy', $item->id) }}" class="btn btn-danger"
                                            onclick="confirm('هل انت متاكد؟')">
                                            حذف
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-3 pt-3" dir="ltr">
                        {{ $product->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
