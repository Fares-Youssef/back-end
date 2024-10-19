@extends('dashboard.layouts.app')
@section('title', 'اضافة كهرباء جديد')
@section('content')
    <div class="container-fluid">
        <div class="card mt-30 mb-50">
            <div class="card-header color-dark fw-500">
                <h4 class="text-capitalize">اضافة كهرباء جديد</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('electric.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-lg-4">
                            <label for="formFile" class="form-label">رقم العقد</label>
                            <select name="contractNum" id="contractNum"
                                    class="form-select @error('contractNum') is-invalid @enderror" required>
                                <option selected disabled>اختر رقم العقد</option>
                                @foreach ($contracts as $data)
                                    <option value="{{ $data->id }}"
                                        {{ old('contractNum') == $data->id ? 'selected' : '' }}>
                                        {{ $data->buildingNum }}
                                    </option>
                                @endforeach
                            </select>
                            @error('contractNum')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-4">
                            <label class="form-label">الفترة من</label>
                            <input name="start" class="form-control @error('start') is-invalid @enderror" type="date"
                                value="{{ old('start') }}">
                            @error('start')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-4">
                            <label class="form-label">الفترة الي</label>
                            <input name="end" class="form-control @error('end') is-invalid @enderror" type="date"
                                value="{{ old('end') }}">
                            @error('end')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">القيمة المدفوعة</label>
                            <input name="value" class="form-control @error('value') is-invalid @enderror" type="number"
                                value="{{ old('value') }}">
                            @error('value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">PDF</label>
                            <input name="PDF" class="form-control @error('PDF') is-invalid @enderror" type="file" accept=".pdf">
                            @error('PDF')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">اضافة كهرباء</button>
                </form>
            </div>
        </div>
    </div>
@endsection
