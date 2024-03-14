@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center py-4">
            <div class="table-responsivee">
                <div class="table-wrapper2">
                    <div class="table-title">
                        <div class="row">
                            <div class="col">
                                <h2>تعديل الاستحقاق</h2>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end">
                                <a onclick="return confirm('are you sure!')"
                                href="{{ route('due.destroy', $due->id) }}"class="btn btn-danger"
                                ><i class="material-icons"><span class="material-symbols-outlined">
                                    &#xe872;</span></i> <span> حذف الاستحقاق  </span></a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('due.update',$due->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row py-2 ">
                            <div class="mb-3 col-lg-6">
                                <label class="form-label">رقم العقد</label>
                                <input class="form-control" type="text" disabled value="{{ $due->contractNum }}">
                                <input name="contractNum" class="form-control d-none" type="text"
                                    value="{{ $due->contractNum }}">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label class="form-label">تاريخ الاستحقاق</label>
                                <input class="form-control" type="date" disabled value="{{ $due->dueDate }}">
                                <input name="dueDate" class="form-control d-none" type="date"
                                    value="{{ $due->dueDate }}">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label class="form-label">القسط المستحق</label>
                                <input class="form-control" type="number" disabled value="{{ $due->dueInstallment }}">
                                <input name="dueInstallment" class="form-control d-none" type="number"
                                    value="{{ $due->dueInstallment }}">
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label class="form-label">المسدد</label>
                                @if ($due->pay == null)
                                    <input name="pay" class="form-control" type="number" value="0.00">
                                @else
                                    <input name="pay" class="form-control" type="number" value="{{ $due->pay }}">
                                @endif
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">البيان</label>
                                <input name="dueData" class="form-control" type="text" value="{{ $due->dueData }}">
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">ملف PDF</label>
                                <input name="file" class="form-control" type="file" value="{{ $due->dueInstallment }}">
                            </div>
                        </div>
                        <div class="py-3 border-top">
                            <button type="submit" class="btn btn-warning w-100">تعديل الاستحقاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
