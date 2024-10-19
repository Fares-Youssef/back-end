@extends('dashboard.layouts.app')
@section('title', 'اضافة استحقاق جديد')
@section('content')
    <div class="container-fluid">
        <div class="card mt-30 mb-50">
            <div class="card-header color-dark fw-500">
                <h4 class="text-capitalize">اضافة استحقاق جديد</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('due.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-lg-6">
                            <label for="contractNum" class="form-label">رقم العقد</label>
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
                        <div class="mb-3 col-lg-6">
                            <label for="dueDate" class="form-label">تاريخ الاستحقاق</label>
                            <input name="dueDate" id="dueDate" class="form-control @error('dueDate') is-invalid @enderror"
                                type="date" value="{{ old('dueDate') }}" required>
                            @error('dueDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="dueInstallment" class="form-label">القسط المستحق</label>
                            <input name="dueInstallment" id="dueInstallment"
                                class="form-control @error('dueInstallment') is-invalid @enderror" type="number"
                                step="0.01" min="0" value="{{ old('dueInstallment') }}" required>
                            @error('dueInstallment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="pay" class="form-label">المسدد</label>
                            <input name="pay" id="pay" class="form-control @error('pay') is-invalid @enderror"
                                type="number" step="0.01" min="0" value="{{ old('pay',0) }}">
                            @error('pay')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="dueData" class="form-label">البيان</label>
                            <input name="dueData" id="dueData" class="form-control @error('dueData') is-invalid @enderror" type="text"
                                placeholder="أدخل تفاصيل البيان" value="{{ old('dueData') }}">
                            @error('dueData')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="duePdf" class="form-label">ملف PDF</label>
                            <input name="duePdf" id="duePdf" class="form-control @error('duePdf') is-invalid @enderror"
                                type="file" accept=".pdf">
                            @error('duePdf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">اضافة الاستحقاق</button>
                </form>
            </div>
        </div>
    </div>
@endsection
