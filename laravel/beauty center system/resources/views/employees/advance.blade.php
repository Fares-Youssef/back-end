@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="page page-center">
            <div class="container container-tight py-4">
                @if (Session::has('done'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <div class="d-flex">
                            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                            <div>
                                عملية ناجحة
                            </div>
                            <div>
                                <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card card-md">
                    <div class="card-body">
                        <h2 class="h2 text-center mb-4">سلفة عامة</h2>
                        <form action="{{route('employee.advanceStore')}}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label"> اسم العامل</label>
                                <select class="js-example-basic-single form-control" name="empId">
                                    @foreach ($employee as $data)
                                        <option value="{{ $data->name }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error('empId')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                                @error('date')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> السلفة</label>
                                <input name="count" type="text"class="form-control @error('count') is-invalid @enderror" placeholder="اضف قيمة السحب" >
                                @error('count')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 d-none">
                                <label class="form-label"> اليوم</label>
                                <input id="inputDate" name="date" type="date"class="form-control">
                                <script>
                                    document.getElementById("inputDate").valueAsDate = new Date();
                                    var today = new Date();
                                    var time = today.getHours() + ":" + today.getMinutes();
                                    document.getElementById('inputTime').value = time;
                                </script>
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary w-100">تسجيل</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
