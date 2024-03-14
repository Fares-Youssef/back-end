@extends('layouts.app')

@section('content')
    <div class="container" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-9">
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
                    <div class="card-header">تسجيل قص جديد</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cut.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-4 mb-3">
                                    <label for="idNum" class="pr-3 col-form-label text-md-end">كود الخام</label>
                                    <input id="idNum" type="text" disabled
                                        class="form-control w-100 @error('idNum') is-invalid @enderror"
                                        value="{{ $cloth->idNum }}" autocomplete="idNum">
                                    <input id="idNum" type="text"
                                        class="form-control w-100 @error('idNum') is-invalid @enderror d-none"
                                        name="idNum" value="{{ $cloth->idNum }}" autocomplete="idNum">
                                    @error('idNum')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="clientName" class="pr-3 col-form-label text-md-end">اسم العميل</label>
                                    <input id="clientName" type="text" disabled
                                        class="form-control w-100 @error('clientName') is-invalid @enderror"
                                        value="{{ $cloth->clientName }}" autocomplete="clientName">
                                    <input id="clientName" type="text"
                                        class="form-control w-100 @error('clientName') is-invalid @enderror d-none"
                                        name="clientName" value="{{ $cloth->clientName }}" autocomplete="clientName">
                                    @error('clientName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="color" class="pr-3 col-form-label text-md-end">اللون</label>
                                    <input id="color" type="text" disabled
                                        class="form-control w-100 @error('color') is-invalid @enderror"
                                        value="{{ $cloth->color }}" autocomplete="color">
                                    <input id="color" type="text"
                                        class="form-control w-100 @error('color') is-invalid @enderror d-none"
                                        name="color" value="{{ $cloth->color }}" autocomplete="color">
                                    @error('color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="type" class="pr-3 col-form-label text-md-end">نوع الخام</label>
                                    <input id="type" type="text" disabled
                                        class="form-control w-100 @error('type') is-invalid @enderror"
                                        value="{{ $cloth->type }}" autocomplete="type">
                                    <input id="type" type="text"
                                        class="form-control w-100 @error('type') is-invalid @enderror d-none" name="type"
                                        value="{{ $cloth->type }}" autocomplete="type">
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="code" class="pr-3 col-form-label text-md-end">كود الموديل</label>
                                    <input id="code" type="text"
                                        class="form-control w-100 @error('code') is-invalid @enderror" name="code"
                                        value="{{ old('code') }}" autocomplete="code" autofocus>
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="name" class="pr-3 col-form-label text-md-end">اسم الموديل</label>
                                    <input id="name" type="text"
                                        class="form-control w-100 @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="count" class="pr-3 col-form-label text-md-end">عدد القطع</label>
                                    <input id="count" type="number"
                                        class="form-control w-100 @error('count') is-invalid @enderror" name="count"
                                        value="{{ old('count') }}" autocomplete="count">
                                    @error('count')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="weight" class="pr-3 col-form-label text-md-end">وزن الفرشة ( بالكيلو جرام
                                        )</label>
                                    <input id="weight" type="number"
                                        class="form-control w-100 @error('weight') is-invalid @enderror" name="weight"
                                        value="{{ old('weight') }}" autocomplete="weight">
                                    @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="num" class="pr-3 col-form-label text-md-end">عدد القطع في الفرشة
                                        الواحدة</label>
                                    <input id="num" type="number"
                                        class="form-control w-100 @error('num') is-invalid @enderror" name="num"
                                        value="{{ old('num') }}" autocomplete="num">
                                    @error('num')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="date" class="pr-3 col-form-label text-md-end">تاريخ القص</label>
                                    <input id="date" type="date"
                                        class="form-control w-100 @error('date') is-invalid @enderror" name="date"
                                        value="{{ old('date') }}" autocomplete="date">
                                    <script>
                                        document.getElementById('date').valueAsDate = new Date()
                                    </script>
                                    @error('date')
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
