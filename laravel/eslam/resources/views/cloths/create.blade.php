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
                    <div class="card-header">تسجيل استلام قماش جديد</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cloth.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label for="idNum" class="pr-3 col-form-label text-md-end">كود الخام</label>
                                    <input id="idNum" type="text"
                                        class="form-control w-100 @error('idNum') is-invalid @enderror" name="idNum"
                                        value="{{ old('idNum') }}" autocomplete="idNum" autofocus>
                                    @error('idNum')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="clientName" class="pr-3 col-form-label text-md-end">اسم العميل</label>
                                    <select name="clientName" id="clientName"
                                        class="form-select @error('clientName') is-invalid @enderror">
                                        <option disabled selected>اختر اسم العميل</option>
                                        @foreach ($client as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('clientName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="color" class="pr-3 col-form-label text-md-end">اللون</label>
                                    <input id="color" type="text"
                                        class="form-control w-100 @error('color') is-invalid @enderror" name="color"
                                        value="{{ old('color') }}" autocomplete="color">
                                    @error('color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="weight" class="pr-3 col-form-label text-md-end"> الوزن ( بالكيلو جرام
                                        )</label>
                                    <input id="weight" type="text"
                                        class="form-control w-100 @error('weight') is-invalid @enderror" name="weight"
                                        value="{{ old('weight') }}" autocomplete="weight">
                                    @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="type" class="pr-3 col-form-label text-md-end">نوع الخام</label>
                                    <input id="type" type="text"
                                        class="form-control w-100 @error('type') is-invalid @enderror" name="type"
                                        value="{{ old('type') }}" autocomplete="type">
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="date" class="pr-3 col-form-label text-md-end">تاريخ استلام
                                        القماش</label>
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
