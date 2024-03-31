@extends('layouts.app')

@section('content')
    <div class="container container-tight py-5">
        <div class="m-auto">
            <form action="{{ route('store.update', $store->id) }}" class="card card-md" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">تعديل المخزن</h2>
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">اسم المخزن</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $store->name }}" autofocus>
                                @error('name')
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
