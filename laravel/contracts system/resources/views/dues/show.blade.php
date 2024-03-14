@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center py-4">
            <div class="table-responsivee">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>تفاصيل العقد</h2>
                            </div>
                            <div class="col-sm-6 d-flex justify-content-end">
                                <a href="#addEmployeeModal" class="btn btn-primary" data-toggle="modal"><i
                                        class="material-icons">&#xe873;</i> <span>تحميل excel sheet</span></a>
                                <a href="#editEmployeeModal" class="btn btn-primary" data-toggle="modal"><i
                                        class="material-icons">picture_as_pdf</i> <span>تحميل pdf</span></a>
                                {{-- <a href="#deleteEmployeeModal" class="btn btn-warning" data-toggle="modal"><i
                                        class="material-icons">&#xE8B8;</i> <span> تعديل في العقد </span></a> --}}
                                <a href="{{ route('contract.edit', $drive->id) }}"class="btn btn-warning"><i
                                        class="material-icons"><span class="material-symbols-outlined">
                                            &#xE8B8;</span></i> <span> تعديل في العقد </span></a>
                                <a onclick="return confirm('are you sure!')"
                                    href="{{ route('contract.destroy', $drive->id) }}"class="btn btn-danger"><i
                                        class="material-icons"><span class="material-symbols-outlined">
                                            &#xe872;</span></i> <span> حذف العقد وكل ملحقاته </span></a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center border-bottom">
                        <h3>
                            بيانات العقد
                        </h3>
                    </div>
                    <div class="row pt-4">
                        <div class="mb-3 col-lg-3">
                            <p>رقم العقار : {{ $drive->buildingNum }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
