@extends('layouts.app')

@section('content')
    <div class="container" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-10">
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
                    <div class="card-header">كشف حساب</div>
                    <div class="card-body text-center">
                        <div class="row text-right mt-3 text-center">
                            <div class="col-lg-6 mb-3">
                                <h3>
                                    اسم العميل : {{ $client->name }}
                                </h3>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <h3>
                                    رقم الهاتف : {{ $client->phone }}
                                </h3>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <h3>
                                    اجمالي قيمة الفواتير : {{ $totalGive }}
                                </h3>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <h3>
                                    اجمالي قيمة الدفعات : {{ $totalAccount }}
                                </h3>
                            </div>
                            <div class="col-lg-3">
                                <h3>
                                    المستحق : {{ $totalGive - $totalAccount }}
                                </h3>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-8">
                                <h3>
                                    استلامات
                                </h3>
                                <div class="table-responsive text-center border">
                                    <table class="table card-table table-striped text-nowrap datatable">
                                        <thead>
                                            <tr>
                                                <th>كود الموديل</th>
                                                <th>عدد القطع</th>
                                                <th>سعر القطعة</th>
                                                <th>اجمالي</th>
                                                <th>التاريخ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($give as $item )
                                                <tr>
                                                    <td>{{ $item->code }}</td>
                                                    <td>{{ $item->count }}</td>
                                                    <td>{{ $item->price }}</td>
                                                    <td>{{ $item->total }}</td>
                                                    <td>{{ $item->date }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>
                                    دفعات
                                </h3>
                                <div class="table-responsive text-center border">
                                    <table class="table card-table table-striped text-nowrap datatable">
                                        <thead>
                                            <tr>
                                                <th>قيمة الدفعة</th>
                                                <th>التاريخ</th>
                                                <th>حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($account as $item )
                                                <tr>
                                                    <td>{{ $item->account }}</td>
                                                    <td>{{ $item->date }}</td>
                                                    <td>
                                                        <a onclick="return confirm('هل انت متاكد')"
                                                            href="{{ route('account.destroy', $item->id) }}"
                                                            class="btn btn-danger py-0">
                                                            حذف
                                                        </a>
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
@endsection
