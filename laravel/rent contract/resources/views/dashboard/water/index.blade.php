@extends('dashboard.layouts.app')
@section('title', 'المياه')

@section('content')
    <div class="container-fluid">
        <div class="card mt-30 mb-50">
            <div class="card-header color-dark fw-500">
                <h4 class="text-capitalize"> المياه </h4>
                <a style="float: right" href="{{ route('waters.create') }}" class="btn btn-primary">اضافة جديدة </a>
            </div>
            <div class="card-body">
                <div class="userDatatable global-shadow border-light-0 w-100">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped nowrap" style="width:100%">
                            <thead>
                                <tr style="text-align-last: center;" class="userDatatable-header">
                                    <th>#</th>
                                    <th>رقم العقد</th>
                                    <th>اسم العقار</th>
                                    <th>الفترة من</th>
                                    <th>الفترة الي</th>
                                    <th>القيمة</th>
                                    <th>PDF</th>
                                    <th>الاجراءات</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center">
                                @foreach ($waters as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ route('contracts.show', $item->contract->id) }}">
                                                {{ $item->contract->buildingNum }}
                                            </a>
                                        </td>
                                        <td>{{ $item->contract->buildingName }}</td>
                                        <td>{{ $item->start }}</td>
                                        <td>{{ $item->end }}</td>
                                        <td>{{ $item->value }}</td>
                                        @if ($item->PDF != null)
                                            <td>
                                                <a href="{{ route('download', [$item->id, 'water']) }}" class="setting fs-4">
                                                    <i class="uil uil-arrow-circle-down"></i> </a>
                                            </td>
                                        @else
                                            <td>....</td>
                                        @endif
                                        <td>
                                            <a style="display: inline-block ;padding: 5px"
                                                href="{{ route('waters.edit', $item->id) }}"><span
                                                    class="mynaui--edit-one"></span></a>
                                            <form style="display: inline-block ;padding: 5px" class="deleteForm"
                                                method="post" action="{{ route('waters.destroy', $item->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <a type="button"
                                                    style="display: inline-block;background: none;border: none"
                                                    class="deleteButton">
                                                    <span class="fluent--delete-48-regular"></span>
                                                </a>
                                            </form>
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
@endsection
