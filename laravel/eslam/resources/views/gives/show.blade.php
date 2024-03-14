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
                    <div class="card-body text-center">
                        <h3>
                            بيانات عن الفاتورة
                        </h3>
                        <div class="row text-right mt-3">
                            <div class="col-lg-6 mb-2">
                                اسم العميل : {{ $give->clientName }}
                            </div>
                            <div class="col-lg-6 mb-2">
                                تاريخ التسليم : <span dir="ltr">{{ $give->date }}</span>
                            </div>
                            <div class="col-lg-6 mb-2">
                                اجمالي الفاتورة : {{ $give->total }} ج.م
                            </div>
                        </div>
                        <hr>
                        <h3>
                            التسليم
                        </h3>
                        <div class="table-responsive text-center">
                            <table class="table card-table table-striped text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th>كود الموديل</th>
                                        <th>عدد القطع</th>
                                        <th>سعر القطعة</th>
                                        <th>اجمالي</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                </tbody>
                            </table>
                            <textarea class="d-none" id="fares" cols="30" rows="10">{{ $give->data }}</textarea>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <button class="btn btn-success w-100">طباعة الفتورة</button>
                                </div>
                                <div class="col-lg-4">
                                    <form method="POST" action="{{ route('give.delete') }}">
                                        @csrf
                                        <input type="text" name="id" class="d-none" value="{{ $give->id }}">
                                        <input type="text" name="data" class="d-none" value="{{ $give->data }}">
                                        <button type="submit" class="btn btn-danger w-100">حذف الفاتورة</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var a = document.getElementById('fares').value;
        myObject = JSON.parse(a);
        console.log(myObject);
        var table = document.getElementById('tbody').innerHTML;
        var value = "";
        for (let i = 0; i < myObject.length; i++) {
            value = `
            <tr>
                <td>${myObject[i].code}</td>
                <td>${myObject[i].count}</td>
                <td>${myObject[i].price}</td>
                <td>${myObject[i].total}</td>
            </tr>
            `
            document.getElementById('tbody').innerHTML += value;
        }
        b = Math.random()*100000000000
        x = Math.round(b)
        console.log(x);
    </script>
@endsection
