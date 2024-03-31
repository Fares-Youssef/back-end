@extends('layouts.app')

@section('content')
    <div class="container container-tight py-5">
        <div class="m-auto">
            @if (Session::has('done'))
                <div class="alert alert-success alert-dismissible py-3" role="alert">
                    <div class="d-flex">
                        <div>
                            <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                        </div>
                        <div>
                            تمت العملية بنجاح
                        </div>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            @endif
            <form action="{{ route('cabin.update', $cabin->id) }}" class="card card-md" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">تعديل الكابينة</h2>
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div>
                                <label class="form-label">اسم المخزن</label>
                                <select name="store_id" class="form-control fares">
                                    <option value="{{ $store->id }}" selected>{{ $store->name }}</option>
                                    @foreach ($stores as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('store_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">اسم الكابينة</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $cabin->name }}" autofocus>
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
    <script>
        $(document).ready(function() {
            $('.fares').select2();
        });
    </script>
@endsection
