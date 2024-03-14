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
                <div class="card-header">كل العملاء المسجلين</div>
                <div class="card-body">
                    <div class="table-responsive text-center">
                        <table class="table card-table table-striped text-nowrap datatable">
                            <thead>
                                <tr>
                                    <th>اسم العميل</th>
                                    <th>هاتف العميل</th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach ($clients as $item )
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        @if ($item->phone == null)
                                            <td>غير متاح</td>
                                        @else
                                        <td>{{ $item->phone }}</td>
                                        @endif
                                        <td>
                                            <a onclick="return confirm('هل انت متاكد')" href="{{ route('client.destroy',$item->id) }}" class="btn btn-danger py-0">
                                                حذف
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div dir="ltr">
                            {{ $clients->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
