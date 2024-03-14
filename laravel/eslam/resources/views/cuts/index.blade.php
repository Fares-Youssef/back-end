@extends('layouts.app')

@section('content')
    <div class="container" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-9">
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
                                <p class="m-0">كل القص المسجل</p>
                            </div>
                            <div class="col">
                                <form action="{{ route('cut.search') }}">
                                    <input type="text" name="search" autofocus
                                        class="form-control @error('search') is-invalid @enderror"
                                        placeholder="بحث باسم العميل او كود الموديل او اسم الموديل...">
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
                                        <th>كود الموديل</th>
                                        <th>اسم الموديل</th>
                                        <th>كود الخام</th>
                                        <th>عدد القطع</th>
                                        <th>اللون</th>
                                        <th>وزن الراق</th>
                                        <th>وزن القطعة الواحدة</th>
                                        <th>نوع الخام</th>
                                        <th>تاريخ القص</th>
                                        <th>حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cut as $item)
                                        <tr>
                                            <td>{{ $item->clientName }}</td>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->idNum }}</td>
                                            <td>{{ $item->count }}</td>
                                            <td>{{ $item->color }}</td>
                                            <td>{{ $item->weight }} كجم</td>
                                            <td>{{ ($item->weight / $item->num) * 1000 }} جم</td>
                                            <td>{{ $item->type }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td>
                                                <a onclick="return confirm('هل انت متاكد')"
                                                    href="{{ route('cut.destroy', $item->id) }}"
                                                    class="btn btn-danger py-0">
                                                    حذف
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if (Session::has('dd'))
                                <div dir="ltr">
                                    {{ $cut->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
