@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <div class="container-xl">
        <div class="col-lg-6 m-auto">
            @if (Session::has('done'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <div class="d-flex">
                    <div>
                        تم الحذف
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="col-lg-4">
                        <h3 class="card-title">اجمالي السلفات العامة</h3>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-icon ">
                            <input autofocus id="myInput" type="text" value="" class="form-control" placeholder="بحث ...">
                            <span class="input-icon-addon">
                                <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                    <path d="M21 21l-6 -6"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable text-center">
                        <thead>
                            <tr>
                                <th>اسم العامل</th>
                                <th>اسم الفرع</th>
                                <th>قيمة السلفة </th>
                                <th>تاريخ </th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach ($employee as $item)
                                <tr>
                                    <td>{{ $item->empId }}</td>
                                    <td>{{ $item->userName }}</td>
                                    <td>{{ $item->count }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td><a href="{{ route('employee.destroyAdvance', $item->id) }}" class="btn btn-danger">
                                            حذف
                                        </a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
