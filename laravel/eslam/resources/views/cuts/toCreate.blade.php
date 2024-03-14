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
                    <div class="card-header">تسجيل قص جديد</div>
                    <div class="card-body">
                        <form method="get" action="{{ route('cut.create') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-12 mb-3">
                                    <label for="idNum" class="col-md-4 col-form-label text-md-end">كود الخام</label>
                                    <Select name="idNum" id="idNum"
                                        class="form-select fares @error('idNum') is-invalid @enderror">
                                        <option disabled selected>اختر كود الخام</option>
                                        @foreach ($cloth as $item)
                                            <option value="{{ $item->id }}">{{ $item->idNum }}</option>
                                        @endforeach
                                    </Select>
                                    @error('idNum')
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
