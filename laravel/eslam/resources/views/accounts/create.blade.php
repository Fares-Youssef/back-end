@extends('layouts.app')

@section('content')
    <div class="container" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-4">
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
                    <div class="card-header">تسجيل دفعة جديدة</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('account.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12 mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">اسم العميل</label>
                                    <Select name="name" id="name"
                                        class="form-select fares @error('name') is-invalid @enderror">
                                        <option disabled selected>اختر اسم العميل</option>
                                        @foreach ($client as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </Select>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="account" class="col-md-4 col-form-label text-md-end">الدفعة</label>
                                    <input type="number" class="form-control @error('account') is-invalid @enderror"
                                        id="account" name="account">
                                    @error('account')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="date" class="col-md-4 col-form-label text-md-end">التاريخ</label>
                                    <input type="date" id="date" class="form-control @error('date') is-invalid @enderror"
                                        id="date" name="date">
                                        <script>
                                            document.getElementById('date').valueAsDate = new Date();
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
    <script>
        $(document).ready(function() {
            $('.fares').select2();
        });
    </script>
@endsection
