@extends('dashboard.layouts.app')
@section('title', 'اضافة نوع عقار جديد')
@section('content')
    <div class="container-fluid">
        <div class="card mt-30 mb-50">
            <div class="card-header color-dark fw-500">
                <h4 class="text-capitalize">اضافة نوع عقار جديد</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('types.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label>نوع العقار <span class="text-danger">*</span></label>
                            <input required type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">اضافة نوع العقار</button>
                </form>
            </div>
        </div>
    </div>
@endsection
