@extends('layouts.app')

@section('content')
    <div class="container" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (Session::has('remove'))
                    <div class="alert alert-danger alert-dismissible py-3" role="alert">
                        <div class="d-flex">
                            <div>
                                تم الحذف بنجاح
                            </div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <p class="m-0">كل الاتسليمات المسجلة</p>
                            </div>
                            <div class="col">
                                <form action="{{ route('give.Search') }}">
                                    <input type="text" name="search" autofocus
                                        class="form-control @error('search') is-invalid @enderror"
                                        placeholder="بحث باسم العميل ...">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table card-table table-striped text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th>اسم العميل</th>
                                        <th>اجمالي الفاتورة</th>
                                        <th>تاريخ التسليم</th>
                                        <th>عرض</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($give as $item)
                                        <tr>
                                            <td>{{ $item->clientName }}</td>
                                            <td>{{ $item->total }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td>
                                                <a href="{{ route('give.show', $item->id) }}" class="btn btn-primary py-0">
                                                    عرض
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if (Session::has('dd'))
                                <div dir="ltr">
                                    {{ $give->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
