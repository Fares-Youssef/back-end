@extends('layouts.app')

@section('content')
    <div class="container" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (Session::has('done'))
                    <div class="alert alert-success alert-dismissible py-3" role="alert">
                        <div class="d-flex">
                            <div>
                                تمت الاضافة بنجاح
                            </div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">تسجيل عميل جديد</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('client.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12 mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">الاسم</label>
                                    <input id="name" type="text"
                                        class="form-control w-100 @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="phone" class="col-md-4 col-form-label text-md-end">رقم الهاتف</label>
                                    <input id="phone" type="text"
                                        class="form-control w-100 @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" autocomplete="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-primary w-100">
                                        تسجيل
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
