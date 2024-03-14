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

                        @if ($drive->buildingNum != null)
                            <div class="mb-3 col-lg-3">
                                <p>رقم العقد : {{ $drive->buildingNum }}</p>
                            </div>
                        @endif
                        @if ($drive->buildingName != null)
                            <div class="mb-3 col-lg-3">
                                <p>اسم العقار : {{ $drive->buildingName }}</p>
                            </div>
                        @endif
                        @if ($drive->buildingType != null)
                            <div class="mb-3 col-lg-6">
                                <p> نوع العقار : {{ $drive->buildingType }}</p>
                            </div>
                        @endif
                        @if ($drive->projectName != null)
                            <div class="mb-3 col-lg-6">
                                <p>اسم المشروع : {{ $drive->projectName }}</p>
                            </div>
                        @endif
                        @if ($drive->city != null)
                            <div class="mb-3 col-lg-3">
                                <p> المدينة : {{ $drive->city }}</p>
                            </div>
                        @endif
                        @if ($drive->buildingIn != null)
                            <div class="mb-3 col-lg-3">
                                <p>مكونات العقار : {{ $drive->buildingIn }}</p>
                            </div>
                        @endif
                        @if ($drive->ownerName != null)
                            <div class="mb-3 col-lg-3">
                                <p>اسم المالك : {{ $drive->ownerName }}</p>
                            </div>
                        @endif
                        @if ($drive->ownerPhone != null)
                            <div class="mb-3 col-lg-3">
                                <p>هاتف المالك : {{ $drive->ownerPhone }}</p>
                            </div>
                        @endif
                        @if ($drive->agentName != null)
                            <div class="mb-3 col-lg-3">
                                <p>اسم الوكيل : {{ $drive->agentName }}</p>
                            </div>
                        @endif
                        @if ($drive->agentPhone != null)
                            <div class="mb-3 col-lg-3">
                                <p>هاتف الوكيل : {{ $drive->agentPhone }}</p>
                            </div>
                        @endif
                        @if ($drive->agencyNum != null)
                            <div class="mb-3 col-lg-3">
                                <p>رقم الوكالة : {{ $drive->agencyNum }}</p>
                            </div>
                        @endif
                        @if ($drive->agencyDate != null)
                            <div class="mb-3 col-lg-3">
                                <p> تاريخ انتهاء الوكالة : {{ $drive->agencyDate }}</p>
                            </div>
                        @endif
                        @if ($drive->mediatorName != null)
                            <div class="mb-3 col-lg-3">
                                <p>اسم الوسيط : {{ $drive->mediatorName }}</p>
                            </div>
                        @endif
                        @if ($drive->mediatorPhone != null)
                            <div class="mb-3 col-lg-3">
                                <p>هاتف الوسيط : {{ $drive->mediatorPhone }}</p>
                            </div>
                        @endif
                        @if ($drive->Administrator != null)
                            <div class="mb-3 col-lg-3">
                                <p>مراقب السكن : {{ $drive->Administrator }}</p>
                            </div>
                        @endif
                        @if ($drive->AdministratorPhone != null)
                            <div class="mb-3 col-lg-3">
                                <p> هاتف مراقب السكن : {{ $drive->AdministratorPhone }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="text-center  border-bottom border-top pt-2">
                        <h3>شروط العقد</h3>
                    </div>
                    <div class="row py-2">
                        @if ($drive->contractType != null)
                            <div class="mb-3 col-lg-3">
                                <p>نوع العقد : {{ $drive->contractType }}</p>
                            </div>
                        @endif
                        @if ($drive->contractTime != null)
                            <div class="mb-3 col-lg-3">
                                <p>مدة العقد : {{ $drive->contractTime }}</p>
                            </div>
                        @endif
                        @if ($drive->contractDetails != null)
                            <div class="mb-3 col-lg-3">
                                <p>تفاصيل العقد : {{ $drive->contractDetails }}</p>
                            </div>
                        @endif
                        @if ($drive->contractValue != null)
                            <div class="mb-3 col-lg-3">
                                <p>قيمة العقد : {{ $drive->contractValue }}</p>
                            </div>
                        @endif
                        @if ($drive->contractStart != null)
                            <div class="mb-3 col-lg-3">
                                <p>تاريخ بداية العقد : {{ $drive->contractStart }}</p>
                            </div>
                        @endif
                        @if ($drive->contractEnd != null)
                            <div class="mb-3 col-lg-3">
                                <p>تاريخ نهاية العقد : {{ $drive->contractEnd }}</p>
                            </div>
                        @endif
                        @if ($drive->contractPDF != null)
                            <div class="mb-3 col-lg-3 ">
                                <div class="row align-items-center">
                                    <p> صورة العقد :
                                        <a href="{{ route('contract.download', $drive->id) }}">
                                            <button type="button"
                                                class="btn btn-primary mx-2 p-1 rounded-0">Download</button>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        @endif
                        @if ($drive->checkbox != null)
                            <div class="mb-3 col-lg-3">
                                <p> العقار مرخص سكن جماعي للافراد : نعم </p>
                            </div>
                        @endif
                        @if ($drive->checkboxPDF != null)
                            <div class="mb-3 col-lg-3 ">
                                <div class="row align-items-center">
                                    <p> صورة الرخصة :
                                        <a href="{{ route('contract.downloadTwo', $drive->id) }}">
                                            <button type="button"
                                                class="btn btn-primary mx-2 p-1 rounded-0">Download</button>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="table-title2">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>الاستحقاقات المسجلة</h2>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th>رقم العقد</th>
                                <th>تاريخ الاستحقاق</th>
                                <th>القسط المستحق</th>
                                <th>المسدد</th>
                                <th>المتبقي</th>
                                <th>سداد الكامل</th>
                                <th>بيان</th>
                                <th>PDF</th>
                                <th>تعديل</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div class="d-none">
                                {{ $x = count($dues) }}
                            </div>
                            @for ($i = 0; $i < $x; $i++)
                                <tr>
                                    <td>{{ $dues[$i]->contractNum }}</td>
                                    <td>{{ $dues[$i]->dueDate }}</td>
                                    <td id="tdThree{{ $i }}">{{ $dues[$i]->dueInstallment }}</td>
                                    @if ($dues[$i]->pay == null)
                                        <td id="tdOne{{ $i }}">0.00</td>
                                    @else
                                        <td id="tdOne{{ $i }}">{{ $dues[$i]->pay }}</td>
                                    @endif
                                    <td>
                                        {{ $dues[$i]->dueInstallment - $dues[$i]->pay }}</td>
                                    <td id="tdTwo{{ $i }}"></td>
                                    @if ($dues[$i]->dueData == null)
                                        <td>....</td>
                                    @else
                                        <td>{{ $dues[$i]->dueData }}</td>
                                    @endif
                                    @if ($dues[$i]->duePdf != null)
                                        <td>
                                            <a href="{{ route('due.download', $dues[$i]->id) }}" class="setting"><i
                                                    class="material-icons">&#xf090;</i></a>
                                        </td>
                                    @else
                                        <td>....</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('due.edit', $dues[$i]->id) }}" class="edit"><i
                                                class="material-icons">&#xe8b8;</i></a>
                                    </td>
                                </tr>
                            @endfor
                            <script>
                                x = {{ count($dues) }};
                                for (let i = 0; i < x; i++) {
                                    z = $(`#tdOne${i}`).text();
                                    f = $(`#tdThree${i}`).text();
                                    if (f - z == 0) {
                                        document.getElementById(`tdTwo${i}`).innerHTML = "نعم";
                                    } else {
                                        document.getElementById(`tdTwo${i}`).innerHTML = "لا";
                                    }
                                }
                            </script>
                        </tbody>
                    </table>
                    <div class="table-title2 mt-4">
                        <div class="row text-center">
                            <div class="col-lg-6">
                                <h2>الماء</h2>
                            </div>
                            <div class="col-lg-6">
                                <h2>الكهرباء </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>الفترة من</th>
                                        <th>الفترة الي</th>
                                        <th>القيمة</th>
                                        <th>PDF</th>
                                        <th>حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($water as $item)
                                        <tr>
                                            <td>{{ $item->start }}</td>
                                            <td>{{ $item->end }}</td>
                                            <td>{{ $item->value }}</td>
                                            @if ($item->PDF != null)
                                                            <td>
                                                                <a href="{{ route('electric.download', $item->id) }}"
                                                                    class="setting"><i
                                                                        class="material-icons">&#xf090;</i></a>
                                                            </td>
                                                        @else
                                                            <td>....</td>
                                                        @endif
                                                        <td><a onclick="return confirm('are you sure!')"
                                                                href="{{ route('electric.destroy', $item->id) }}"
                                                                class="delete"><i class="material-icons">&#xe872;</i></a>
                                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table class="table table-striped table-hover text-center border-right">
                                <thead>
                                    <tr>
                                        <th>الفترة من</th>
                                        <th>الفترة الي</th>
                                        <th>القيمة</th>
                                        <th>PDF</th>
                                        <th>حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($electric as $item)
                                        <tr>
                                            <td>{{ $item->start }}</td>
                                            <td>{{ $item->end }}</td>
                                            <td>{{ $item->value }}</td>
                                            @if ($item->PDF != null)
                                                            <td>
                                                                <a href="{{ route('electric.download', $item->id) }}"
                                                                    class="setting"><i
                                                                        class="material-icons">&#xf090;</i></a>
                                                            </td>
                                                        @else
                                                            <td>....</td>
                                                        @endif
                                                        <td><a onclick="return confirm('are you sure!')"
                                                                href="{{ route('electric.destroy', $item->id) }}"
                                                                class="delete"><i class="material-icons">&#xe872;</i></a>
                                                        </td>
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
@endsection
