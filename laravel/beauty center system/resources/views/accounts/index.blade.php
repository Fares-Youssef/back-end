@extends('layouts.app')

@section('content')
<div class="container-xl">
    <div class="col-6 m-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="col-lg-4">
                    <h3 class="card-title">العمال</h3>
                </div>
                <div class="col-lg-4">
                    <div class="input-icon ">
                        <input type="text" value="" class="form-control" placeholder="بحث ...">
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
                            <th>الكود</th>
                            <th>اسم العامل</th>
                            <th>رقم الهاتف</th>
                            <th>المرتب</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>15</td>
                            <td>ahmed</td>
                            <td>ahmed</td>
                            <td>ahmed</td>
                            <td><a href="#" class="btn btn-danger">
                                    Danger
                                </a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
