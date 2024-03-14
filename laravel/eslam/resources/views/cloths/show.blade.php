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
                    <div class="card-header">بيان عن الخام : {{ $cloth->idNum }}</div>
                    <div class="card-body text-center">
                        <h3>
                            بيانات عن الخام
                        </h3>
                        <div class="row text-right mt-3">
                            <div class="col-lg-6 mb-2">
                                كود الخام : {{ $cloth->idNum }}
                            </div>
                            <div class="col-lg-6 mb-2">
                                اسم العميل : {{ $cloth->clientName }}
                            </div>
                            <div class="col-lg-6 mb-2">
                                اللون : {{ $cloth->color }}
                            </div>
                            <div class="col-lg-6 mb-2">
                                الوزن المستلم : {{ $cloth->weight }} كجم
                            </div>
                            <div class="col-lg-6 mb-2">
                                نوع الخام : {{ $cloth->type }}
                            </div>
                            <div class="col-lg-6 mb-2">
                                تاريخ الستلام : <span dir="ltr">{{ $cloth->date }}</span>
                            </div>
                        </div>
                        <hr>
                        <h3>
                            القص
                        </h3>
                        <div class="table-responsive text-center">
                            <table class="table card-table table-striped text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th>كود الموديل</th>
                                        <th>اسم الموديل</th>
                                        <th>عدد القطع</th>
                                        <th>وزن الراق</th>
                                        <th>وزن القطعة الواحدة</th>
                                        <th>تاريخ القص</th>
                                    </tr>
                                </thead>
                                <script>
                                    a = [];
                                </script>
                                <tbody>
                                    @foreach ($cut as $item)
                                        <tr>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->count }}</td>
                                            <td>{{ $item->weight }} كجم</td>
                                            <td>{{ ($item->weight / $item->num) * 1000 }} جم</td>
                                            <td>{{ $item->date }}</td>
                                        </tr>
                                        <script>
                                            b = {{ $item->count }} * {{ $item->weight / $item->num }}
                                            a.push(b);
                                        </script>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <h3 id="sum">
                            </h3>
                            <script>
                                var sum = 0;
                                for (let i = 0; i < a.length; i++) {
                                    sum += a[i];
                                }
                                var sum2 = {{ $cloth->weight }} - sum;
                                document.getElementById('sum').innerHTML = `الوزن المتبقي : ${sum2} كجم`
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
