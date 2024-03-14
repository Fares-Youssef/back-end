<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>print</title>
    <link rel="stylesheet" href="{{ asset('css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabler-flags.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabler-payments.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabler-vendors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demo.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cdn.jsdelivr.net_npm_select2@4.1.0-rc.0_dist_css_select2.min.css') }}">
</head>

<body>
    <div style="width:400px ; background:#fff;" class="text-center m-auto">
        <div class="img">
            <img src="{{ asset('img/maha-makboul-logo (1).png') }}" alt="" width="100%">
        </div>
        <div class="d-flex flex-wrap">
            @foreach ($receipt as $item)
                <div class="col-6 p-2">
                    الفرع : {{ $item->id }}
                </div>
            @endforeach

            <div class="col-6 p-2">
                اسم العميل :
            </div>
            <div class="col-6 p-2">
                اسم العامل :
            </div>
            <div class="col-6 p-2">
                التاريخ :
            </div>
            <div class="col-12 p-2 d-none">
                <input id="product" type="text" value="">
            </div>
        </div>
        <br>
        <table class="table table-vcenter card-table border-top w-100 text-center">
            <thead>
                <tr>
                    <th>الخدمة</th>
                    <th>السعر</th>
                    <th>الكمية</th>
                    <th>الاجمالي</th>
                </tr>
            </thead>
            <tbody id="t-body">

            </tbody>
        </table>
        <div class="d-flex flex-wrap">
            <h3 class="col-6 border-bottom p-1 mt-2">
                اجمالي الفاتورة :
            </h3>
            <h3 class="col-6 border-bottom p-1 mt-2">

            </h3>
            <h3 class="col-6 border-bottom p-1">
                المدفوع :
            </h3>
            <h3 class="col-6 border-bottom p-1">

            </h3>
            <h3 class="col-6 border-bottom p-1">
                الباقي :
            </h3>
            <h3 class="col-6 border-bottom p-1">

            </h3>
        </div>
    </div>

    <script src="{{ asset('js/tabler.min.js') }}"></script>
    <script src="{{ asset('js/demo.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script lang="js">
        protect = document.getElementById("product").value;
        fares = JSON.parse(protect);
        var productBox = ""
        for (var i = 0; i < fares.length; i++) {
            productBox += `
                            <tr>
                                <td>${fares[i].name}</td>
                                <td>
                                    ${fares[i].price}
                                </td>
                                <td>
                                    ${fares[i].count}
                                </td>
                                <td>
                                    ${fares[i].total}
                                </td>
                            </tr>
            `
        }
        document.getElementById("t-body").innerHTML = productBox;
    </script>
</body>

</html>
