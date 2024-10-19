@extends('dashboard.layouts.app')
@section('title', 'تفاصيل العقد')
@section('content')
    <style>
        p {
            color: #000;
        }
    </style>
    <div class="container-fluid">
        <div class="row  my-30">
            <div class="col-lg-3">
                <a href="{{ route('contracts.previous', $contract->id) }}" class="btn btn-primary">العقد السابق </a>
            </div>
            <div class="col-lg-6 text-center">
                <h1>
                    رقم العقد : {{ $contract->buildingNum }}
                </h1>
            </div>
            <div class="col-lg-3 row justify-content-end">
                <a href="{{ route('contracts.next', $contract->id) }}" class="btn btn-primary">العقد التالي </a>
            </div>
        </div>
        <div class="card mb-50">
            <div class="card-header color-dark fw-500">
                <h4 class="text-capitalize">تفاصيل العقد</h4>
                @if($contract->done == 1)
                    <h4 class="text-danger">تم تسليم العقار</h4>
                @endif
                <div class="d-flex" style="gap: 20px">
                    @if($contract->done != 1)
                        <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-primary">تعديل العقد </a>
                    @endif
                    <form style="display: inline-block ;padding: 5px" class="deleteForm" method="post"
                        action="{{ route('contracts.destroy', $contract->id) }}">
                        @method('DELETE')
                        @csrf
                        <a type="button" class="deleteButton btn btn-danger">
                            حذف العقد
                        </a>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <h4>
                        بيانات العقد
                    </h4>
                    <br><br>
                    @if ($contract->buildingNum != null)
                        <div class="mb-3 col-lg-3">
                            <p>رقم العقد : {{ $contract->buildingNum }}</p>
                        </div>
                    @endif
                    @if ($contract->buildingName != null)
                        <div class="mb-3 col-lg-3">
                            <p>اسم العقار : {{ $contract->buildingName }}</p>
                        </div>
                    @endif
                    @if ($contract->buildingType != null)
                        <div class="mb-3 col-lg-6">
                            <p> نوع العقار : {{ $contract->type_name?->name }}</p>
                        </div>
                    @endif
                    @if ($contract->projectName != null)
                        <div class="mb-3 col-lg-6">
                            <p>اسم المشروع : {{ $contract->projectName }}</p>
                        </div>
                    @endif
                    @if ($contract->city != null)
                        <div class="mb-3 col-lg-3">
                            <p> المنطقة : {{ $contract->city_name?->name }}</p>
                        </div>
                    @endif
                    @if ($contract->buildingIn != null)
                        <div class="mb-3 col-lg-3">
                            <p>مكونات العقار : {{ $contract->buildingIn }}</p>
                        </div>
                    @endif
                    @if ($contract->ownerName != null)
                        <div class="mb-3 col-lg-3">
                            <p>اسم المالك : {{ $contract->ownerName }}</p>
                        </div>
                    @endif
                    @if ($contract->ownerPhone != null)
                        <div class="mb-3 col-lg-3">
                            <p>هاتف المالك : {{ $contract->ownerPhone }}</p>
                        </div>
                    @endif
                    @if ($contract->agentName != null)
                        <div class="mb-3 col-lg-3">
                            <p>اسم الوكيل : {{ $contract->agentName }}</p>
                        </div>
                    @endif
                    @if ($contract->agentPhone != null)
                        <div class="mb-3 col-lg-3">
                            <p>هاتف الوكيل : {{ $contract->agentPhone }}</p>
                        </div>
                    @endif
                    @if ($contract->agencyNum != null)
                        <div class="mb-3 col-lg-3">
                            <p>رقم الوكالة : {{ $contract->agencyNum }}</p>
                        </div>
                    @endif
                    @if ($contract->agencyDate != null)
                        <div class="mb-3 col-lg-3">
                            <p> تاريخ انتهاء الوكالة : <span dir="ltr">{{ $contract->agencyDate }}</span></p>
                        </div>
                    @endif
                    @if ($contract->mediatorName != null)
                        <div class="mb-3 col-lg-3">
                            <p>اسم الوسيط : {{ $contract->mediatorName }}</p>
                        </div>
                    @endif
                    @if ($contract->mediatorPhone != null)
                        <div class="mb-3 col-lg-3">
                            <p>هاتف الوسيط : {{ $contract->mediatorPhone }}</p>
                        </div>
                    @endif
                    @if ($contract->Administrator != null)
                        <div class="mb-3 col-lg-3">
                            <p>المراقب المسئول : {{ $contract->Administrator }}</p>
                        </div>
                    @endif
                    @if ($contract->AdministratorPhone != null)
                        <div class="mb-3 col-lg-3">
                            <p> هاتف المراقب المسئول : {{ $contract->AdministratorPhone }}</p>
                        </div>
                    @endif
                    @if ($contract->type != null)
                        <div class="mb-3 col-lg-3">
                            <p> صيغة العقد : {{ $contract->type }}</p>
                        </div>
                    @endif
                    <hr class="my-3">
                    <h4>شروط العقد</h4>
                    <br><br>
                    @if ($contract->contractType != null)
                        <div class="mb-3 col-lg-3">
                            <p>نوع استخدام العقار : {{ $contract->details?->name }}</p>
                        </div>
                    @endif
                    @if ($contract->contractTime != null)
                        <div class="mb-3 col-lg-3">
                            <p>مدة العقد : {{ $contract->contractTime }}</p>
                        </div>
                    @endif
                    @if ($contract->contractDetails != null)
                        <div class="mb-3 col-lg-3">
                            <p>نظام سداد الدفعات : {{ $contract->time?->name }}</p>
                        </div>
                    @endif
                    @if ($contract->contractValue != null)
                        <div class="mb-3 col-lg-3">
                            <p>قيمة العقد : {{ $contract->contractValue }}</p>
                        </div>
                    @endif
                    @if ($contract->contractStart != null)
                        <div class="mb-3 col-lg-3">
                            <p>تاريخ بداية العقد : <span dir="ltr">{{ $contract->contractStart }}</span></p>
                        </div>
                    @endif
                    @if ($contract->contractEnd != null)
                        <div class="mb-3 col-lg-3">
                            <p>تاريخ نهاية العقد : <span dir="ltr">{{ $contract->contractEnd }}</span></p>
                        </div>
                    @endif
                    @if ($contract->rentStart != null)
                        <div class="mb-3 col-lg-3">
                            <p>بداية الفترة الايجارية : <span dir="ltr">{{ $contract->rentStart }}</span></p>
                        </div>
                    @endif
                    @if ($contract->rentEnd != null)
                        <div class="mb-3 col-lg-3">
                            <p>نهاية الفترة الايجارية : <span dir="ltr">{{ $contract->rentEnd }}</span></p>
                        </div>
                    @endif
                    @if ($contract->rentValue != null)
                        <div class="mb-3 col-lg-3">
                            <p>قيمة الفترة الايجارية : {{ $contract->rentValue }}</p>
                        </div>
                    @endif
                    @if ($contract->rentTime != null)
                        <div class="mb-3 col-lg-3">
                            <p>مدة الفترة الايجارية : {{ $contract->rentTime }}</p>
                        </div>
                    @endif
                    @if ($contract->contractPDF != null)
                        <div class="mb-3 col-lg-3 ">
                            <div class="row align-items-center">
                                <p> صورة العقد :
                                    <a href="{{ route('download', [$contract->id, 'contractPDF']) }}">
                                        <button type="button" class="btn btn-primary d-inline"
                                            style="min-height: auto;line-height: 1.7">
                                            <i class="uil uil-arrow-circle-down"></i>
                                            تحميل
                                        </button>
                                    </a>
                                </p>
                            </div>
                        </div>
                    @endif
                    @if ($contract->checkbox != null)
                        <div class="mb-3 col-lg-3">
                            <p> العقار مرخص سكن جماعي للافراد : نعم </p>
                        </div>
                    @endif
                    @if ($contract->checkboxPDF != null)
                        <div class="mb-3 col-lg-3 ">
                            <div class="row align-items-center">
                                <p> صورة الرخصة :
                                    <a href="{{ route('download', [$contract->id, 'checkboxPDF']) }}">
                                        <button type="button" class="btn btn-primary d-inline"
                                            style="min-height: auto;line-height: 1.7">
                                            <i class="uil uil-arrow-circle-down"></i>
                                            تحميل
                                        </button>
                                    </a>
                                </p>
                            </div>
                        </div>
                    @endif
                    @if ($contract->done == 0)
                        <div class="mb-3 col-lg-3 ">
                            <div class="row align-items-center">
                                <p>حالة العقد : قيد العمل
                                </p>
                            </div>
                        </div>
                    @endif
                    @if ($contract->done == 1)
                        <div class="mb-3 col-lg-3 ">
                            <div class="row align-items-center">
                                <p>حالة العقد : تم التسليم
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card mb-50">
            <div class="card-header color-dark fw-500">
                <h4 class="text-capitalize"> الاستحقاقات </h4>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    اضافة استحقاق جديد
                </button>
            </div>
            <div class="card-body">
                <div class="userDatatable global-shadow border-light-0 w-100">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped nowrap" style="width:100%">
                            <thead>
                                <tr style="text-align-last: center;" class="userDatatable-header">
                                    <th>#</th>
                                    <th>تاريخ الاستحقاق</th>
                                    <th>القسط المستحق</th>
                                    <th>المسدد</th>
                                    <th>المتبقي</th>
                                    <th>سداد الكامل</th>
                                    <th>بيان</th>
                                    <th>PDF</th>
                                    {{-- <th>الاجراءات</th> --}}
                                </tr>
                            </thead>
                            <tbody style="text-align: center">
                                @foreach ($contract->dues as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->dueDate }}</td>
                                        <td>{{ $item->dueInstallment }}</td>
                                        <td>{{ $item->pay }}</td>
                                        <td>{{ $item->dueInstallment - $item->pay }}</td>
                                        <td>{{ $item->dueInstallment - $item->pay == 0 ? 'نعم' : 'لا' }}</td>
                                        @if ($item->dueData == null)
                                            <td>....</td>
                                        @else
                                            <td>{{ $item->dueData }}</td>
                                        @endif
                                        @if ($item->duePdf != null)
                                            <td>
                                                <a href="{{ route('download', [$item->id, 'due']) }}" class="setting fs-4">
                                                    <i class="uil uil-arrow-circle-down"></i> </a>
                                            </td>
                                        @else
                                            <td>....</td>
                                        @endif
                                        {{-- <td>
                                            <a style="display: inline-block ;padding: 5px"
                                                href="{{ route('due.edit', $item->id) }}"><span
                                                    class="mynaui--edit-one"></span></a>
                                            <form style="display: inline-block ;padding: 5px" class="deleteForm"
                                                method="post" action="{{ route('due.destroy', $item->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <a type="button"
                                                    style="display: inline-block;background: none;border: none"
                                                    class="deleteButton">
                                                    <span class="fluent--delete-48-regular"></span>
                                                </a>
                                            </form>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-50">
                    <div class="card-header color-dark fw-500">
                        <h4 class="text-capitalize"> الكهرباء </h4>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                            اضافة
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="userDatatable global-shadow border-light-0 w-100">
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped nowrap" style="width:100%">
                                    <thead>
                                        <tr style="text-align-last: center;" class="userDatatable-header">
                                            <th>#</th>
                                            <th>الفترة من</th>
                                            <th>الفترة الي</th>
                                            <th>القيمة</th>
                                            <th>PDF</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center">
                                        @foreach ($contract->electrics as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->start }}</td>
                                                <td>{{ $item->end }}</td>
                                                <td>{{ $item->value }}</td>
                                                @if ($item->PDF != null)
                                                    <td>
                                                        <a href="{{ route('download', [$item->id, 'electric']) }}"
                                                            class="setting fs-4">
                                                            <i class="uil uil-arrow-circle-down"></i> </a>
                                                    </td>
                                                @else
                                                    <td>....</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-50">
                    <div class="card-header color-dark fw-500">
                        <h4 class="text-capitalize"> المياه </h4>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                            اضافة
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="userDatatable global-shadow border-light-0 w-100">
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped nowrap" style="width:100%">
                                    <thead>
                                        <tr style="text-align-last: center;" class="userDatatable-header">
                                            <th>#</th>
                                            <th>الفترة من</th>
                                            <th>الفترة الي</th>
                                            <th>القيمة</th>
                                            <th>PDF</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center">
                                        @foreach ($contract->waters as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->start }}</td>
                                                <td>{{ $item->end }}</td>
                                                <td>{{ $item->value }}</td>
                                                @if ($item->PDF != null)
                                                    <td>
                                                        <a href="{{ route('download', [$item->id, 'water']) }}"
                                                            class="setting fs-4">
                                                            <i class="uil uil-arrow-circle-down"></i> </a>
                                                    </td>
                                                @else
                                                    <td>....</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">اضافة استحقاق جديد</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('contracts.due', $contract->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-lg-12">
                                <label for="dueDate" class="form-label">تاريخ الاستحقاق</label>
                                <input name="dueDate" id="dueDate"
                                    class="form-control @error('dueDate') is-invalid @enderror" type="date"
                                    value="{{ old('dueDate') }}" required>
                                @error('dueDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label for="dueInstallment" class="form-label">القسط المستحق</label>
                                <input name="dueInstallment" id="dueInstallment"
                                    class="form-control @error('dueInstallment') is-invalid @enderror" type="number"
                                    step="0.01" min="0" value="{{ old('dueInstallment') }}" required>
                                @error('dueInstallment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label for="pay" class="form-label">المسدد</label>
                                <input name="pay" id="pay"
                                    class="form-control @error('pay') is-invalid @enderror" type="number" step="0.01"
                                    min="0" value="{{ old('pay', 0) }}">
                                @error('pay')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label for="dueData" class="form-label">البيان</label>
                                <input name="dueData" id="dueData"
                                    class="form-control @error('dueData') is-invalid @enderror" type="text"
                                    placeholder="أدخل تفاصيل البيان" value="{{ old('dueData') }}">
                                @error('dueData')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label for="duePdf" class="form-label">ملف PDF</label>
                                <input name="duePdf" id="duePdf"
                                    class="form-control @error('duePdf') is-invalid @enderror" type="file"
                                    accept=".pdf">
                                @error('duePdf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-start">
                        <button type="submit" class="btn btn-primary">تسجيل</button>
                        <button type="button" class="btn btn-gray" data-bs-dismiss="modal">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">اضافة كهرباء</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('contracts.electric', $contract->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">الفترة من</label>
                                <input name="start" class="form-control @error('start') is-invalid @enderror" type="date"
                                    value="{{ old('start') }}">
                                @error('start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">الفترة الي</label>
                                <input name="end" class="form-control @error('end') is-invalid @enderror" type="date"
                                    value="{{ old('end') }}">
                                @error('end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">القيمة المدفوعة</label>
                                <input name="value" class="form-control @error('value') is-invalid @enderror" type="number"
                                    value="{{ old('value') }}">
                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">PDF</label>
                                <input name="PDF" class="form-control @error('PDF') is-invalid @enderror" type="file" accept=".pdf">
                                @error('PDF')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-start">
                        <button type="submit" class="btn btn-primary">تسجيل</button>
                        <button type="button" class="btn btn-gray" data-bs-dismiss="modal">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">اضافة مياه</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('contracts.water', $contract->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">الفترة من</label>
                                <input name="start" class="form-control @error('start') is-invalid @enderror" type="date"
                                    value="{{ old('start') }}">
                                @error('start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">الفترة الي</label>
                                <input name="end" class="form-control @error('end') is-invalid @enderror" type="date"
                                    value="{{ old('end') }}">
                                @error('end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">القيمة المدفوعة</label>
                                <input name="value" class="form-control @error('value') is-invalid @enderror" type="number"
                                    value="{{ old('value') }}">
                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label class="form-label">PDF</label>
                                <input name="PDF" class="form-control @error('PDF') is-invalid @enderror" type="file" accept=".pdf">
                                @error('PDF')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-start">
                        <button type="submit" class="btn btn-primary">تسجيل</button>
                        <button type="button" class="btn btn-gray" data-bs-dismiss="modal">الغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
