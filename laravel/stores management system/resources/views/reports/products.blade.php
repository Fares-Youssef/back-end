@extends('layouts.app')

@section('content')
    <div class="container pt-3">
        <div class="row mb-5">
            <div class="col-lg-6 text-center">
                <a id="btnExport" class="btn btn-lg btn-success w-50">Excel sheet</a>
            </div>
            <div class="col-lg-6 text-center">
                <a onclick="printDiv('tableReport')" class="btn btn-lg btn-danger w-50">Print PDF</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body border-bottom">
                <div class="row">
                    <div class="col-lg-4">
                        <h3 class="card-title m-0">تقرير بكل المنتجات</h3>
                    </div>
                    <div class="col-lg-8 row justify-content-end">
                        <div class="col-3">
                            <form action="{{ route('report.productsSearch') }}" method="post">
                                @csrf
                                <input type="search" name="search" placeholder="بحث ..."
                                    class="form-control form-control-sm w-100" aria-label="Search invoice">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-center">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                            <th colspan="3">المنتج</th>
                            <th>الكمية</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr>
                                <td colspan="3">{{ $item->name }}</td>
                                <td>{{ $item->sum }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-3 pt-3" dir="ltr">
                    {{ $product->links() }}
                </div>
            </div>
            <div class="table-responsive text-center d-none" id="tableReport">
                <table class="table card-table table-vcenter text-nowrap datatable" >
                    <thead>
                        <tr>
                            <th colspan="3">المنتج</th>
                            <th>الكمية</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td colspan="3">{{ $item->name }}</td>
                                <td>{{ $item->sum }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#btnExport").click(function() {
                let table = document.getElementById('tableReport');
                TableToExcel.convert(
                    table, { // html code may contain multiple tables so here we are refering to 1st table tag
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
