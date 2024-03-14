@extends('layouts.app')

@section('content')
    <div class="container py-4">
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
                        تم التسجيل بنجاح
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif
        <form class="card card-md w-75 m-auto" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="card-body">
                <h2 class="card-title text-center mb-4">تسجيل حساب جديد</h2>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">الاسم</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class=" col-lg-6 mb-3">
                        <label class="form-label">User name</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">الرقم السري</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">تأكيد الرقم السري</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            autocomplete="new-password">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">نوع التسجيل</label>
                        <Select class="form-select @error('type') is-invalid @enderror" name="type" id="mySelect" onchange="select()">
                            <option selected disabled>اختر نوع التسجيل</option>
                            <option value="مدير موقع">مدير موقع</option>
                            <option value="مدير مدينة">مدير مدينة</option>
                            <option value="مدير مقر">مدير مقر</option>
                        </Select>
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label class="form-label">المدينة / المقر</label>
                        <Select class="form-select @error('location') is-invalid @enderror d-none" name="location" id="one">
                            <option selected disabled>اختر </option>
                            <option value="كل">كل</option>
                        </Select>
                        <Select class="form-select @error('location') is-invalid @enderror d-block" name="location" id="four">
                        </Select>
                        <Select class="form-select @error('location') is-invalid @enderror d-none" name="location" id="two">
                            <option selected disabled>اختر المقر</option>
                            @foreach ($location as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </Select>
                        <Select class="form-select @error('location') is-invalid @enderror d-none" name="location" id="three">
                            <option selected disabled>اختر المدينة</option>
                            @foreach ($city as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </Select>
                        <script>
                            function select() {
                                x = document.getElementById("mySelect").value;
                                console.log(x);
                                if( x === "مدير موقع"){
                                    document.getElementById("one").className = document.getElementById("one").className.replace("d-none","d-block");
                                    document.getElementById("two").className = document.getElementById("two").className.replace("d-block","d-none");
                                    document.getElementById("three").className = document.getElementById("three").className.replace("d-block","d-none");
                                    document.getElementById("four").className = document.getElementById("three").className.replace("d-block","d-none");
                                }
                                if( x === "مدير مقر"){
                                    document.getElementById("two").className = document.getElementById("two").className.replace("d-none","d-block");
                                    document.getElementById("one").className = document.getElementById("one").className.replace("d-block","d-none");
                                    document.getElementById("four").className = document.getElementById("three").className.replace("d-block","d-none");
                                    document.getElementById("three").className = document.getElementById("three").className.replace("d-block","d-none");
                                }
                                if( x ==="مدير مدينة"){
                                    document.getElementById("three").className = document.getElementById("three").className.replace("d-none","d-block");
                                    document.getElementById("two").className = document.getElementById("two").className.replace("d-block","d-none");
                                    document.getElementById("four").className = document.getElementById("three").className.replace("d-block","d-none");
                                    document.getElementById("one").className = document.getElementById("one").className.replace("d-block","d-none");
                                }
                            }
                        </script>
                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">تسجيل حساب جديد</button>
                </div>
            </div>
        </form>
        @if (Session::has('remove'))
            <div class="alert alert-danger alert-dismissible mt-3" role="alert">
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
                        تم الحذف بنجاح
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif
        <div class="card my-3">
            <div class="card-body border-bottom">
                <div class="row">
                    <div class="col-lg-4">
                        <h3 class="card-title m-0">كل المشتركين المسجلين</h3>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-center">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th>اسم المشترك</th>
                            <th>user name</th>
                            <th>الصلاحيات</th>
                            <th>المدينة / المقر</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->location }}</td>
                                <td>
                                    <a href="{{ route('user.destroy', $item->id) }}"><span class="btn btn-danger">
                                            delete
                                        </span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <div class="text-center " dir="ltr" id="pag">
                {{ $location->links() }}
            </div> --}}
            <style>
                #pag {
                    position: relative;
                }

                #pag nav div:last-child div:last-child {
                    display: none;
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
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.fares').select2();
        });
    </script>
@endsection
