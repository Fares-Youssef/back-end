@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="m-auto">
            <form action="{{ route('sub.store') }}" class="card card-md" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">تسجيل اشتراك جديد للعامل رقم : {{ $item->num }}</h2>
                    <div class="row">
                        <div class="col-lg-1">
                            <div class="mb-3">
                                <label class="form-label">الرقم الوظيفي</label>
                                <input type="text" class="form-control" disabled value="{{ $item->num }}">
                                <input type="text" class="form-control d-none" name="subNum"
                                    value="{{ $item->num }}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">الاسم</label>
                                <input type="text" class="form-control" disabled name="name"
                                    value="{{ $item->name }}">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label">رقم الهوية \ الاقامة</label>
                                <input type="text" class="form-control" name="job" disabled
                                    value="{{ $item->idNum }}">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label">الجنسية</label>
                                <input type="text" class="form-control" disabled name="idNum"
                                    value="{{ $item->nationality }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">الموقع</label>
                                <input type="text" class="form-control" disabled name="location"
                                    value="{{ $item->location }}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label"> اسم المقر</label>
                                <select name="locationName" class="form-select @error('locationName') is-invalid @enderror">
                                    <option disabled selected>اختر اسم القمر</option>
                                    @foreach ($location as $item)
                                        @if (Auth::user()->type == 'مدير مدينة')
                                            @if ($item->city == Auth::user()->location)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endif
                                        @endif
                                        @if (Auth::user()->type == 'مدير مقر')
                                            @if ($item->name == Auth::user()->location)
                                                <option value="{{ $item->name }}" selected>{{ $item->name }}</option>
                                            @endif
                                        @endif
                                        @if (Auth::user()->type == 'مدير موقع')
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('locationName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">رقم الكبينة</label>
                                <input type="text" class="form-control @error('box') is-invalid @enderror" name="box"
                                    value="{{ old('box') }}">
                                @error('box')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">رقم الغرفة</label>
                                <input type="text" class="form-control @error('room') is-invalid @enderror"
                                    name="room" value="{{ old('room') }}">
                                @error('room')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">رقم الايصال</label>
                                <input type="text" class="form-control @error('receipt') is-invalid @enderror"
                                    name="receipt" value="{{ old('receipt') }}">
                                @error('receipt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">الميز</label>
                                <select class="form-select @error('food') is-invalid @enderror" name="food">
                                    <option disabled selected>اختر الميز</option>
                                    <option value="العربي-ARABIC">العربي-ARABIC</option>
                                    <option value="الهندي-INDIAN">الهندي-INDIAN</option>
                                    <option value="باكستانى-PAKISTANI">باكستانى-PAKISTANI</option>
                                    <option value="سريلانكي-SRI LANKAN">سريلانكي-SRI LANKAN</option>
                                    <option value="بنجالي-BENGALI">بنجالي-BENGALI</option>
                                    <option value="	فلبينى-FILIPINO">فلبينى-FILIPINO</option>
                                </select>
                                @error('food')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">نوع الاشتراك</label>
                                <select class="form-select @error('type') is-invalid @enderror" name="type">
                                    <option selected disabled>اختر نوع الاشتراك</option>
                                    <option value="فطار-Breakfast">فطار-Breakfast</option>
                                    <option value="غداء-Lunch">غداء-Lunch</option>
                                    <option value="Dinner-عشاء">Dinner-عشاء</option>
                                    <option value="فطار+غداء-Breakfast and Lunch">فطار+غداء-Breakfast and Lunch</option>
                                    <option value="فطار+عشاء-Breakfast and Dinner">فطار+عشاء-Breakfast and Dinner</option>
                                    <option value="غداء+عشاء-Lunch and Dinner">غداء+عشاء-Lunch and Dinner</option>
                                    <option value="كامل الاشتراك-FULL">كامل الاشتراك-FULL</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">قيمة الاشتراك</label>
                                <input type="text" class="form-control @error('value') is-invalid @enderror"
                                    name="value" value="{{ old('value') }}">
                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">فتره الاشتراك</label>
                                <input type="text" class="form-control" disabled value="{{ $date->date }}">
                                <input type="text" class="form-control d-none" name="start"
                                    value="{{ $date->date }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label"> مسئول الميز</label>
                                <input type="text" class="form-control @error('chef') is-invalid @enderror"
                                    name="chef" value="{{ old('chef') }}">
                                @error('chef')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">توقيع المشترك</label>
                                <input type="text" class="form-control @error('signature') is-invalid @enderror"
                                    name="signature" value="{{ $item->name }}">
                                @error('signature')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">تسجيل</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
