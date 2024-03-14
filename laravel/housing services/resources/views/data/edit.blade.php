@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="w-75 m-auto">
            <form action="{{ route('data.update', $data->id) }}" class="card card-md" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="border-bottom mb-4 row">
                        <div class="col">
                            <h2 class="card-title">تعديل بيانات العامل رقم : {{ $data->num }}</h2>
                        </div>
                        <div class="col-lg-1 row justify-content-end">
                            <div class="w-100">
                                <a href="{{ route('data.destroy',$data->id) }}" onclick="return confirm('هل انت متاكد')" type="submit" class="btn btn-danger m-auto">حذف</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">رقم اوراكل</label>
                                <input type="text" class="form-control @error('num') is-invalid @enderror" name="num" disabled
                                    value="{{ $data->num }}">
                                <input type="text" class="form-control @error('num') is-invalid @enderror d-none" name="num"
                                    value="{{ $data->num }}">
                                @error('num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">الاسم</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $data->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">المهنة</label>
                                <input type="text" class="form-control @error('job') is-invalid @enderror" name="job"
                                    value="{{ $data->job }}">
                                @error('job')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">رقم الهوية \ الاقامة</label>
                                <input type="text" class="form-control @error('idNum') is-invalid @enderror"
                                    name="idNum" value="{{ $data->idNum }}">
                                @error('idNum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">المنطقة</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                    name="city" value="{{ $data->city }}">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">الموقع</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror"
                                    name="location" value="{{ $data->location }}">
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">الجنسية</label>
                                <input type="text" class="form-control @error('nationality') is-invalid @enderror"
                                    name="nationality" value="{{ $data->nationality }}">
                                @error('nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">حالة</label>
                                <input type="text" class="form-control @error('status') is-invalid @enderror"
                                    name="status" value="{{ $data->status  }}">
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-warning w-100">تعديل</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
