@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="col-12">
            <div class="py-2">
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
            </div>
            <div class="card">

                <div class="card-header d-flex justify-content-between">
                    <div class="col-lg-4">
                        <h3 class="card-title">الفواتير</h3>
                    </div>
                    <div class="col-lg-4">
                        <form class="m-0" action="{{ route('receipt.search') }}">
                            @csrf
                            <div class="input-icon">
                                <input autofocus name="search" type="text" value="" class="form-control"
                                    placeholder="اكتب الرقم المرجعي   ">
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
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable text-center">
                        <thead>
                            <tr>
                                <th>الرقم المرجعي</th>
                                @if (Auth::user()->id == 1)
                                    <th>اسم الفرع</th>
                                @endif
                                <th>اسم العميل</th>
                                <th>اسم العامل</th>
                                <th>التاريخ</th>
                                <th>سعر الفاتوره</th>
                                <th>طباعه</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($receipt as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->userName }}</td>
                                    <td>{{ $item->clientName }}</td>
                                    <td>{{ $item->empName }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->total }}</td>
                                    <td><a href="#" class="btn btn-info">
                                            طباعه
                                        </a></td>
                                    <td><a href="{{ route('receipt.destroy', $item->id) }}" class="btn btn-danger">
                                            حذف
                                        </a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{-- @if (Session::has('done')) --}}
                    <div class="text-center pt-3 justfy-content-center  ">
                        {{ $receipt->links() }}
                    </div>
                {{-- @endif --}}
            </div>
        </div>
    </div>
@endsection
