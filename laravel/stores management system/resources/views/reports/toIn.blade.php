@extends('layouts.app')

@section('content')
    <div class="container container-tight py-5">
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
            <form action="{{ route('report.in') }}" class="card card-md" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">تقرير الايداعات</h2>
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div>
                                <label class="form-label">اسم المنتج</label>
                                <select name="product" class="form-control fares">
                                    <option disabled selected>كل المنتجات</option>
                                    @foreach ($product as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('product')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">الفترة من</label>
                                <input type="date" class="form-control @error('from') is-invalid @enderror"
                                    name="from">
                                @error('from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">الفترة الي</label>
                                <input type="date" class="form-control @error('to') is-invalid @enderror" name="to"
                                    value="<?php echo date('Y-m-d'); ?>">
                                @error('to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">عرض</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.fares').select2();
        });
    </script>
@endsection
