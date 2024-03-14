@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="m-auto">
            <form action="{{ route('sub.update', $sub->id) }}" class="card card-md" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="border-bottom mb-4 row">
                        <div class="col">
                            <h2 class="card-title  ">تعديل الاشتراك للعامل رقم : {{ $sub->subNum }}</h2>
                        </div>
                        <div class="col-lg-1 row justify-content-end">
                            <div class="w-100">
                                <a href="{{ route('sub.destroy', $sub->id) }}" onclick="return confirm('هل انت متاكد')"
                                    type="submit" class="btn btn-danger m-auto">حذف</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-1">
                            <div class="mb-3">
                                <label class="form-label">الرقم الوظيفي</label>
                                <input type="text" class="form-control" disabled value="{{ $sub->subNum }}">
                                <input type="text" class="form-control d-none" name="subNum"
                                    value="{{ $sub->subNum }}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">الاسم</label>
                                <input type="text" class="form-control" disabled name="name"
                                    value="{{ $sub->name }}">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label">رقم الهوية \ الاقامة</label>
                                <input type="text" class="form-control" name="job" disabled
                                    value="{{ $sub->idNum }}">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label">الجنسية</label>
                                <input type="text" class="form-control" disabled name="idNum"
                                    value="{{ $sub->nationality }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">الموقع</label>
                                <input type="text" class="form-control" disabled name="location"
                                    value="{{ $sub->location }}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">اسم المقر </label>
                                <select name="locationName" class="form-select @error('locationName') is-invalid @enderror">
                                    <option disabled selected>اختر اسم القمر</option>
                                    @foreach ($location as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
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
                                    value="{{ $sub->box }}">
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
                                    name="room" value="{{ $sub->room }}">
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
                                    name="receipt" value="{{ $sub->receipt }}">
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
                                    <option value="{{ $sub->food }}" selected>{{ $sub->food }}</option>
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
                                <input type="text" class="form-control @error('type') is-invalid @enderror"
                                    name="type" value="{{ $sub->type }}">
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
                                    name="value" value="{{ $sub->value }}">
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
                                <input type="text" class="form-control" disabled value="{{ $sub->start }}">
                                <input type="text" class="form-control d-none" name="start" value="{{ $sub->start }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">توقيع الطباخ</label>
                                <input type="text" class="form-control @error('chef') is-invalid @enderror"
                                    name="chef" value="{{ $sub->chef }}">
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
                                    name="signature" value="{{ $sub->name }}">
                                @error('signature')
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
