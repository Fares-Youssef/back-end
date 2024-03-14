@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="col-12">
            <div class="py-2">
                @if (Session::has('done'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <div class="d-flex">
                            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                            <div>
                                عملية ناجحة
                            </div>
                            <div>
                                <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title col-lg-6">فاتورة جديدة</h3>
                    <div class="col-lg-3 order-lg-last row justify-content-left">
                        <a href="#" class="btn btn-secondary mx-2 col" data-bs-toggle="modal"
                            data-bs-target="#modal-team">
                            اضافة عميل
                        </a>
                        <a href="#" class="btn btn-info mx-2 col" data-bs-toggle="modal"
                            data-bs-target="#modal-team-two">
                            اضافة خدمة
                        </a>
                    </div>
                    <div class="modal modal-blur fade" id="modal-team" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">اضافة عميل جديد</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('client.store') }}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row mb-3 align-items-end">
                                            <div class="col">
                                                <label class="form-label ">الاسم</label>
                                                <input name="name" type="text" value="{{ old('name') }}"
                                                    class="form-control  @error('name') is-invalid @enderror" />
                                                @error('name')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <label class="form-label">رقم الهاتف</label>
                                            <input name="phone" type="number"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}">
                                            @error('phone')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn " data-bs-dismiss="modal">الغاء</button>
                                        <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                                            اضافة</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="modal modal-blur fade" id="modal-team-two" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">اضافة خدمة جديدة</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('product.store') }}">
                                    <div class="modal-body">
                                        <div class="row mb-3 align-items-end">
                                            <div class="col">
                                                <label class="form-label">اسم الخدمة</label>
                                                <input name="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ old('name') }}" />
                                                @error('name')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn " data-bs-dismiss="modal">الغاء</button>
                                        <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                                            اضافة</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('receipt.store') }}">
                    @csrf

                    <div class="card-body py-3 row text-center">
                        <div class="col-lg-3 ">
                            <label class="form-label pb-2">رقم هاتف العميل</label>
                            <select id="select" onchange="fares()" class="js-example-basic-single form-control" name="clientName">
                                <option disabled selected> اختار هاتف العميل </option>
                                @foreach ($client as $data)
                                    <option value="{{ $data->name }}">{{ $data->phone }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 ">
                            <label class="form-label pb-2">اسم العميل</label>
                            <input id="empName" type="text" class="form-control text-center" disabled>
                            <script>
                                function fares() {
                                    empPhone = document.getElementById("select").value;
                                    document.getElementById("empName").value = empPhone
                                }
                            </script>
                        </div>
                        <div class="col-lg-3">
                            <label class="form-label pb-2">اسم العامل</label>
                            <select class="js-example-basic-single form-control p-5" name="empName">
                                <option disabled selected> اختار اسم العامل </option>
                                @foreach ($employee as $data)
                                    <option value="{{ $data->name }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label class="form-label pb-2">التاريخ</label>
                            <input id="inputDate" type="date" class="form-control" name="date">

                        </div>
                    </div>

                    <div class="card-body border-bottom py-3 d-flex text-center flex-wrap justify-content-around">
                        <div class="col-lg-12">
                            <h3 class="text-center">
                                الخدمات
                            </h3>
                        </div>
                        @foreach ($product as $item)
                            <div class="col-lg-3 p-2">
                                <input onclick="getvalue()" type="button" class="btn btn-info m-2 w-100 p-3"
                                    value="{{ $item->name }}">
                            </div>
                        @endforeach
                    </div>

                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <thead>
                                <tr>
                                    <th>الخدمة</th>
                                    <th>السعر</th>
                                    <th>الكمية</th>
                                    <th>اجمالي</th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody id="t-body">
                            </tbody>
                        </table>
                    </div>

                    {{-- <div class="card-body border-bottom py-3 ">
                        <div class="form-selectgroup form-selectgroup-boxes d-flex flex-nowrap justify-content-center">
                            <label class="form-selectgroup-item  col-lg-4">
                                <input type="radio" name="form-payment" value="visa" class="form-selectgroup-input">
                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                    <div class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </div>
                                    <div>
                                        <span class="payment payment-provider-visa payment-xs me-2"></span>
                                        <strong>الدفع نقدا</strong>
                                    </div>
                                </div>
                            </label>
                            <label class="form-selectgroup-item  col-lg-4">
                                <input type="radio" name="form-payment" value="mastercard"
                                    class="form-selectgroup-input" checked="">
                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                    <div class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </div>
                                    <div>
                                        <span class="payment payment-provider-mastercard payment-xs me-2">
                                            <img src="{{asset('img/فوري.png')}}" alt="">
                                        </span>
                                        <strong>الدفع عن طريق فوري</strong>
                                    </div>
                                </div>
                            </label>
                            <label class="form-selectgroup-item  col-lg-4">
                                <input type="radio" name="form-payment" value="paypal" class="form-selectgroup-input">
                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                    <div class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </div>
                                    <div>
                                        <span class="payment payment-provider-paypal payment-xs me-2"></span>
                                        <strong>الدفع عن طريق فودافون كاش</strong>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div> --}}

                    <div class="card-footer p-0 d-flex align-items-center justify-content-around">
                        <div class="col-lg-3 py-3 d-none">
                            <div class="row">
                                <label class="form-label  col-4 col-form-label ">اجمالي الفاتورة</label>
                                <input id="fullTotal" type="number" class="form-control col" name="total">
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div class="row">
                                <label class="form-label  col-4 col-form-label ">اجمالي الفاتورة</label>
                                <input id="fullTotal2" type="number" class="form-control col" disabled name="total"
                                    placeholder="0.00">
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div class="row">
                                <label class="form-label  col-3 col-form-label ">المدفوع</label>
                                <input id="cash" type="number" class="form-control col" name="paid"
                                    placeholder="0.00">
                            </div>
                        </div>
                        <div class="col-lg-3 py-3 d-none">
                            <div class="row">
                                <label class="form-label  col-3 col-form-label ">الباقي</label>
                                <input id="totalTotal" type="number" on class="form-control col" name="totalTotal">
                            </div>
                        </div>
                        <div class="col-lg-3 py-3">
                            <div class="row">
                                <label class="form-label  col-3 col-form-label ">الباقي</label>
                                <input id="totalTotal2" type="number" on class="form-control col" disabled
                                    placeholder="0.00" name="totalTotal">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer p-0 d-flex align-items-center justify-content-around">
                        <div class="col-lg-5 py-3">
                            <div class="row">
                                <label  class="form-label  col-4 col-form-label ">تاريخ المعاينة</label>
                                <input id="inputDate2"type="date" class="form-control col" name="futureDate">
                            </div>
                        </div>
                        <div class="col-lg-5 py-3">
                            <div class="row">
                                <label class="form-label  col-3 col-form-label ">السعر</label>
                                <input type="number" class="form-control col"name="futurePrice" placeholder="0.00">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer p-0 d-none align-items-center justify-content-around">
                        <div class="col-lg-12 py-3">
                            <input type="text" id="jsonFile" name="product">
                        </div>
                    </div>
                    <div class="card-footer p-0 d-flex align-items-center justify-content-around">
                        <div class="col-lg-6 py-3">
                            <button class="btn btn-info m-2 w-100 p-3" type="submit">تسجيل </button>
                        </div>
                    </div>

                </form>

            </div>

        </div>
    </div>
    <script>
        document.getElementById("inputDate").valueAsDate = new Date();
        document.getElementById("inputDate2").valueAsDate = new Date();
    </script>
@endsection
