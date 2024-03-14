@extends('layouts.app')

@section('content')
    <div class="container" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (Session::has('done'))
                    <div class="alert alert-success alert-dismissible py-3" role="alert">
                        <div class="d-flex">
                            <div>
                                تمت الاضافة بنجاح
                            </div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">تسجيل تسليم جديد</div>
                    <form class="p-0 m-0" method="POST" action="{{ route('give.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row text-right mb-3">
                                <div class="col-lg-4">
                                    <h4>
                                        اسم العميل : {{ $client }}
                                    </h4>
                                    <input type="text" class="form-control d-none" name="clientName"
                                        value="{{ $client }}" required>
                                </div>
                                <div class="col-lg-4">
                                    <h4>
                                        اجمالي الفاتورة : <span id="span">0</span>
                                    </h4>
                                    <input type="text" id="total" class="form-control d-none" name="total"
                                        required>
                                </div>
                                <div class="col-lg-4">
                                    <input type="date" id="date" class="form-control" name="date" required>
                                </div>
                            </div>
                            <div class="table-responsive text-center">
                                <table class="table card-table table-striped text-nowrap datatable">
                                    <thead>
                                        <tr>
                                            <th>كود الموديل</th>
                                            <th>عدد القطع</th>
                                            <th>سعر القطعة</th>
                                            <th>الاجمالي</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablee">
                                        <tr>
                                            <td class="d-none">
                                                <input type="text"class="form-control" value="{{ $client }}"
                                                    required>
                                            </td>
                                            <td>
                                                <select class="form-select w-100" style="min-width: max-content" required>
                                                    <option disabled selected> اختر كود الموديل</option>
                                                    @foreach ($cut as $item)
                                                        <option value="{{ $item->code }}">{{ $item->code }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number"class="form-control" onkeyup="sumTotal()" onchange="sumTotal()" required>
                                            </td>
                                            <td>
                                                <input type="number"class="form-control" onkeyup="sumTotal()" onchange="sumTotal()" required>
                                            </td>
                                            <td>
                                                <input type="number"class="form-control" disabled required>
                                                <input type="number"class="form-control d-none" required>
                                            </td>
                                            <td class="d-none">
                                                <input type="date" class="form-control date" required>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mb-0">
                                <div class="col-lg-12 mb-3 ">
                                    <button type="button" class="btn btn-success w-100" id="btn">
                                        اضافة عنصر
                                    </button>
                                </div>
                                <textarea name="data" id="textarea" class="form-control mb-3 d-none" cols="30" rows="5"></textarea>
                                <div class="col-lg-12 ">
                                    <button type="submit" id="fares" class="btn btn-primary w-100">
                                        تسجيل
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('btn').addEventListener("click", function() {
            var table = document.getElementById('tablee');

            var newRow = document.createElement('tr');
            newRow.innerHTML = `
            <td class="d-none">
                <input type="text"class="form-control" value="{{ $client }}" required>
            </td>
            <td>
                <select class="form-select w-100"
                    style="min-width: max-content" required>
                    <option disabled selected> اختر كود الموديل</option>
                    @foreach ($cut as $item)
                        <option value="{{ $item->code }}">{{ $item->code }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number"class="form-control" onkeyup="sumTotal()" onchange="sumTotal()" required>
            </td>
            <td>
                <input type="number"class="form-control" onkeyup="sumTotal()" onchange="sumTotal()" required>
            </td>
            <td>
                <input type="number"class="form-control" disabled required>
                <input type="number"class="form-control d-none" required>
            </td>
            <td class="d-none">
                <input type="date" class="form-control date" required>
            </td>
            `;
            table.appendChild(newRow);
            x = document.getElementById('date').value;
            $('.date').val(x);
        });
        // Assuming you have a submit button with the id "submitBtn"
        document.getElementById('fares').addEventListener("click", function() {
            var tableRows = document.getElementById('tablee').getElementsByTagName('tr');
            var dataArray = [];

            // Start from index 1 to skip the header row
            for (var i = 0; i < tableRows.length; i++) {
                var currentRow = tableRows[i];
                var inputs = currentRow.getElementsByTagName('input');
                var select = currentRow.querySelector('select');
                b = Math.random() * 100000000000
                x = Math.round(b)
                var rowData = {
                    removeId: x,
                    clientName: inputs[0].value,
                    code: select.value,
                    count: inputs[1].value,
                    price: inputs[2].value,
                    total: inputs[3].value,
                    date: inputs[4].value
                };

                dataArray.push(rowData);
            }


            // Display the array of objects (you can do whatever you want with it)
            fares = JSON.stringify(dataArray)
            document.getElementById('textarea').innerHTML = fares;
        });

        function sumTotal() {
            var tableRows = document.getElementById('tablee').getElementsByTagName('tr');
            var total = [];
            for (var i = 0; i < tableRows.length; i++) {
                var currentRow = tableRows[i];
                var inputs = currentRow.getElementsByTagName('input');

                var a = inputs[1].value
                var b = inputs[2].value
                var z = a * b;
                inputs[3].value = z
                inputs[4].value = z
                total.push(z);
            }
            var sum2 = 0;
            for (let i = 0; i < total.length; i++) {
                sum2 += Number(total[i]);
            }
            console.log(sum2);
            document.getElementById('span').innerHTML = sum2;
            document.getElementById('total').value = sum2;
        }
        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear() + "-" + (month) + "-" + (day);
        $('#date').val(today);
        x = document.getElementById('date').value;
        $('.date').val(x);
        document.getElementById('date').addEventListener("change", function() {
            x = document.getElementById('date').value;
            $('.date').val(x);
        });
    </script>
@endsection
