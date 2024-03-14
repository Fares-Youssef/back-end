@extends('layouts.app')

@section('content')
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <div class="container pt-3">
        @if (Session::has('done'))
            <div class="alert alert-success alert-dismissible py-3" role="alert">
                <div class="d-flex">
                    <div>
                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                    </div>
                    <div>
                        تم التعديل بنجاح
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif
        @if (Session::has('del'))
            <div class="alert alert-danger alert-dismissible py-3" role="alert">
                <div class="d-flex">
                    <div>
                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                    </div>
                    <div>
                        تم حذف العامل
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif
        <div class="card">
            <div class="card-body border-bottom">
                <div class="row">
                    <div class="col-lg-4">
                        <h3 class="card-title m-0">كل العمالة المسجلة</h3>
                    </div>
                    <div class="col-lg-8 row justify-content-end">
                        <div class="col-3">
                            <form action="{{ route('data.search') }}" method="post">
                                @csrf
                                <input type="search" name="search" placeholder="بحث ..."
                                    class="form-control form-control-sm w-100" aria-label="Search invoice">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-center">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th>رقم اوراكل</th>
                            <th>الاسم</th>
                            <th>المهنة</th>
                            <th>رقم الهوية \ الاقامة</th>
                            <th>المنطقة</th>
                            <th>الموقع</th>
                            <th>الجنسية</th>
                            @if (Auth::user()->type == 'مدير موقع')
                                <th>تعديل</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->num }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->job }}</td>
                                <td>{{ $item->idNum }}</td>
                                <td>{{ $item->city }}</td>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->nationality }}</td>
                                @if (Auth::user()->type == 'مدير موقع')
                                    <td><a href="{{ route('data.edit', $item->id) }}"><span
                                                class="material-symbols-outlined">
                                                settings
                                            </span></a></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center " dir="ltr" id="pag">
                {{ $data->links() }}
            </div>
            <style>
                #pag {
                    position: relative;
                }

                #pag nav div:last-child div:last-child {
                    display: none;
                    /* display: flex */
                }

                #pag nav div:last-child {
                    position: absolute;
                    top: 19px;
                    left: calc(50% - (232.300px/2));
                }

                #pag nav div:last-child span {
                    margin: 0px 5px
                }
            </style>

            {{-- <div class="card-footer d-flex align-items-center" dir="ltr">

                <p class="m-0 text-secondary">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
                <ul class="pagination m-0 ms-auto">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M15 6l-6 6l6 6"></path>
                            </svg>
                            prev
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9 6l6 6l-6 6"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </div>
@endsection
