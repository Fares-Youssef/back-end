@extends('dashboard.layouts.app')
@section('title', 'تعديل المدينة')
@section('content')
    <div class="container-fluid">
        <div class="card mt-30 mb-50">
            <div class="card-header color-dark fw-500">
                <h4 class="text-capitalize">تعديل المدينة</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('cities.update', $city->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label>اسم المدينة <span class="text-danger">*</span></label>
                            <input required type="text" name="name" class="form-control"
                                value="{{ $city->name }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">تحديث المدينة</button>
                </form>
            </div>
        </div>
    </div>
@endsection
