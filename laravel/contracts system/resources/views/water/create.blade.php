@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center py-4">
            <div class="table-responsivee">
                <div class="table-wrapper2">
                    <div class="table-title">
                        <div class="row">
                            <div class="col">
                                <h2>اضافة فاتورة ماء</h2>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('water.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row py-2 ">
                            <div class="mb-3 col-lg-12">
                                <label for="formFile" class="form-label">رقم العقد</label>
                                <select name="contractNum" class="form-select fares" aria-label="Default select example" dir="rtl">
                                    <option selected disabled>اختر رقم العقد</option>
                                    @foreach ($contracts as $data)
                                        <option value="{{ $data->buildingNum }}">{{ $data->buildingNum }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">الفترة من</label>
                                <input name="start" class="form-control" type="date">
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">الفترة الي</label>
                                <input name="end" class="form-control" type="date">
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">القيمة المدفوعة</label>
                                <input name="value" class="form-control" type="number">
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">PDF</label>
                                <input name="PDF" class="form-control" type="file">
                            </div>
                        </div>
                        <div class="py-3 border-top">
                            <button type="submit" class="btn btn-primary w-100">تسجيل</button>
                        </div>
                    </form>
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
