@extends('layouts.app')

@section('content')
    <div class="container  py-5">
        <div class="m-auto">
            @if (Session::has('done'))
                <div class="alert alert-success alert-dismissible py-3" role="alert">
                    <div class="d-flex">
                        <div>
                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                        </div>
                        <div>
                            تمت العملية بنجاح
                        </div>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            @endif
            <form action="{{ route('in.store') }}" class="card card-md" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">تسجيل ايداع جديد</h2>
                    <div class="row">
                        <div class="col-lg-12 mb-3 ">
                            <div>
                                <label class="form-label">اسم المنتج</label>
                                <select name="product_id" id="product_id" class="form-control fares w-100">
                                    <option disabled selected>اختر اسم المخزن</option>
                                    @foreach ($product as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div>
                                <label class="form-label">المخزن</label>
                                <select name="store_id" id="store_id" class="form-control fares" onchange="fares()">
                                    <option disabled selected>اختر اسم المخزن</option>
                                    @foreach ($store as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('store_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div>
                                <label class="form-label">الكبينة</label>
                                <select name="cabin_id" id="cabin_id" class="form-control fares">
                                    <option disabled selected>اختر اسم الكبينة</option>
                                    {{-- @foreach ($cabin as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach --}}
                                </select>
                                @error('cabin_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <label class="form-label">الكمية</label>
                                <input type="number" step="any" class="form-control @error('value') is-invalid @enderror"
                                    name="value" value="{{ old('value') }}">
                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div>
                                <label class="form-label">التاريخ</label>
                                <input type="date" id="date"
                                    class="form-control @error('date') is-invalid @enderror" name="date"
                                    value="<?php echo date('Y-m-d'); ?>">
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">تسجيل</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card my-3">
            <div class="card-body border-bottom">
                <div class="row">
                    <div class="col">
                        <h3 class="card-title m-0">كل الايداعات المسجلة</h3>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-center">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th>اسم المنتج</th>
                            <th>اسم المخزن</th>
                            <th>اسم الكبينة</th>
                            <th>الكمية</th>
                            <th>تاريخ الايداع</th>
                            <th>تعديل</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($in as $item)
                            <tr>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->store_name }}</td>
                                <td>{{ $item->cabin_name }}</td>
                                <td>{{ $item->value }}</td>
                                <td>{{ $item->date }}</td>
                                <td>
                                    <a href="{{ route('in.edit', $item->id) }}" class="btn btn-warning">
                                        تعديل
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('in.destroy', $item->id) }}" class="btn btn-danger"
                                        onclick="confirm('هل انت متاكد؟')">
                                        حذف
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-3 pt-3" dir="ltr">
                    {{ $in->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        var cabin = @json($cabin);

        function fares() {
            var selectStore = document.getElementById("store_id").value;
            var selectCabin = document.getElementById("cabin_id");

            selectCabin.innerHTML = '<option disabled selected>اختر اسم الكبينة</option>';

            if (selectStore) {
                var cabinFiltering = cabin.filter(cabin => cabin.store_id == selectStore);
                cabinFiltering.forEach(cabin => {
                    let newOption = document.createElement("option");
                    newOption.value = cabin.id;
                    newOption.text = cabin.name;
                    selectCabin.add(newOption);
                });
            }
        }
        $(document).ready(function() {
            $('.fares').select2();
        });
    </script>
@endsection
