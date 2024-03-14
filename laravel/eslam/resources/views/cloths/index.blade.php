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
                                <p class="m-0">كل الخامات المسجلة</p>
                            </div>
                            <div class="col">
                                <form action="{{ route('cloth.search') }}">
                                    <input type="text" name="search" autofocus
                                        class="form-control @error('search') is-invalid @enderror"
                                        placeholder="بحث باسم العميل...">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table card-table table-striped text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th>كود الخام</th>
                                        <th>اسم العميل</th>
                                        <th>اللون</th>
                                        <th>الوزن</th>
                                        <th>نوع الخام</th>
                                        <th>تاريخ الاستلام</th>
                                        <th>حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cloth as $item)
                                        <tr>
                                            <td>{{ $item->idNum }}</td>
                                            <td>{{ $item->clientName }}</td>
                                            <td>{{ $item->color }}</td>
                                            <td>{{ $item->weight }} كجم</td>
                                            <td>{{ $item->type }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td>
                                                <a onclick="return confirm('هل انت متاكد')"
                                                    href="{{ route('cloth.destroy', $item->id) }}"
                                                    class="btn btn-danger py-0">
                                                    حذف
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if (Session::has('remove'))
                                <div dir="ltr">
                                    {{ $cloth->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
