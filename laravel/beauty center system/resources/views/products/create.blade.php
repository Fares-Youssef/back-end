@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="page page-center">
            <div class="container container-tight py-4">
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

                <div class="card card-md">
                    <div class="card-body">
                        <h2 class="h2 text-center mb-4">اضافة خدمة جديدة</h2>
                        <form action="{{ route('product.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label"> اسم الخدمة</label>
                                <input autofocus name="name" type="text"class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" placeholder="اضف اسم الخدمة" required>
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary w-100">اضافه</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
