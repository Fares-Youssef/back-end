@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
    <style type="text/css">
        @media print {
            #one {
                display: none;
            }

            #two {
                display: none;
            }
        }
    </style>

    <div class="EmployeeData dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4 content_building">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 text-right">
                            <h6 class="m-0 font-weight-bold">تقرير بالمشاريع</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="content_building">
                                <div class="row">
                                    <div class="col-lg-12 text-center" id="one">
                                        <button type="button" class="btn btn-save btn-success display-3 mt-1 mr-2"
                                            onclick="printDiv('printableArea')">
                                            طباعه التقرير
                                        </button>
                                        <button type="button" class="btn btn-save btn-success display-3 mt-1"
                                            id="btnExport">
                                            استخراج التقرير
                                        </button>
                                    </div>
                                    <div class="col-lg-12 mt-5 w-100" style="overflow: auto">
                                        <table id="tableOne" class="table table-striped text-center w-100 text-nowrap"
                                            dir="rtl" style="border :1px solid #c8c8c8;">
                                            <thead class="text-center">
                                                <tr>
                                                    <th class="text-center">المشروع</th>
                                                    <th class="text-center">عدد الساكنين</th>
                                                    <th class="text-center">اجمالي التكلفة</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($location as $item)
                                                    @if (Auth::user()->type == 1)
                                                        <tr>
                                                            <td>{{ $item->empLocation }}</td>
                                                            <td>{{ $item->count }}</td>
                                                            <td>{{ $item->total_value }}</td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td>{{ $item['empLocation'] }}</td>
                                                            <td>{{ $item['count'] }}</td>
                                                            <td>{{ $item['total_value'] }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td class="text-center">الاجمالي</td>
                                                    <td class="text-center">{{ $housing }}</td>
                                                    <td class="text-center">{{ $value }}</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mt-5 w-100 d-none" id="printableArea">
        <table class="table table-striped text-center w-100 text-nowrap" dir="rtl" style="border :1px solid #c8c8c8;">
            <thead class="text-center">
                <tr>
                    <th class="text-center">المشروع</th>
                    <th class="text-center">عدد الساكنين</th>
                    <th class="text-center">اجمالي التكلفة</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($location as $item)
                    @if (Auth::user()->type == 1)
                        <tr>
                            <td>{{ $item->empLocation }}</td>
                            <td>{{ $item->count }}</td>
                            <td>{{ $item->total_value }}</td>
                        </tr>
                    @else
                        <tr>
                            <td>{{ $item['empLocation'] }}</td>
                            <td>{{ $item['count'] }}</td>
                            <td>{{ $item['total_value'] }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="text-center">الاجمالي</td>
                    <td class="text-center">{{ $housing }}</td>
                    <td class="text-center">{{ $value }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $("#btnExport").click(function() {
                let table = document.getElementsByTagName("table");
                TableToExcel.convert(table[
                    1
                ], { // html code may contain multiple tables so here we are refering to 1st table tag
                    name: `export.xlsx`, // fileName you could use any name
                    sheet: {
                        name: 'Sheet 1' // sheetName
                    }
                });
            });
        });

        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
