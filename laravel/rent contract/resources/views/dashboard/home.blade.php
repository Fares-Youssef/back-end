@extends('dashboard.layouts.app')
@section('title', 'قاعدة البيانات')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <style>
        .card-header {
            border: none !important;
            min-height: auto !important;
            padding-block: 10px;
            /* display: block !important; */
            margin-top: 20px;
            align-items: center !important;
        }

        .spare-part {
            background-color: #f4f5f7;
            border-radius: 10px;
            padding: 10px;
            height: 100%;
            transition: all .5s !important;
            box-shadow: 0 0 3px transparent;
        }

        .spare-part:hover {
            box-shadow: 0 0 3px #0008;
        }

        .spare-part:hover .counter {
            color: #8231D3
        }

        .spare-part .counter {
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: #000;
            font-weight: 600;
            transition: all .5s
        }

        .spare-part h6 {
            font-size: 14px
        }
    </style>
    <div class="container-fluid">
        <div class="row justify-content-center mt-3">
            <div class="col-md-12 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <div>
                            <h3>اجمالي كل العقود المسجلة </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="spare-part">
                                            <h6>العقود المسجلة</h6>
                                            <div class="counter" style="color: #8231D3"
                                                data-target="{{ App\Models\Contract::where('done', 0)->count() }}">
                                                0
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="spare-part">
                                            <h6>اجمالى قيمة العقود</h6>
                                            <div class="counter" style="color: #8231D3"
                                                data-target="{{ App\Models\Contract::where('done', 0)->sum('contractValue') }}">
                                                0
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach (App\Models\City::all() as $index => $city)
                <div class="col-md-12 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <div>
                                <h3>{{ $city->name }}</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <div class="spare-part">
                                                <h6>العقود المسجلة</h6>
                                                <div class="counter"
                                                    data-target="{{ App\Models\Contract::where('done', 0)->where('city', $city->id)->count() }}">
                                                    0
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="spare-part">
                                                <h6>اجمالى قيمة العقود</h6>
                                                <div class="counter"
                                                    data-target="{{ App\Models\Contract::where('done', 0)->where('city', $city->id)->sum('contractValue') }}">
                                                    0
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6" id="chart{{ $index }}">
                                </div>
                                <div class="col-lg-6" id="chartt{{ $index }}">
                                </div>
                            </div>
                        </div>
                        </div>
                    @php
                        $details = App\Models\Detail::select('id', 'name')->get(); // Keep as a collection

                        // Count of contracts based on city and contract type
                        $contractData = $details->map(function ($item) use ($city) {
                            return App\Models\Contract::where('done', 0)
                                ->where('city', $city->id)
                                ->where('contractType', $item->id) // Use object property since it's a collection
                                ->count();
                        })->toArray();

                        // Sum of contract values based on city and contract type
                        $contractValueData = $details->map(function ($item) use ($city) {
                            return App\Models\Contract::where('done', 0)
                                ->where('city', $city->id)
                                ->where('contractType', $item->id) // Use object property since it's a collection
                                ->sum('contractValue');
                        })->toArray();
                    @endphp

                    <script>
                        var options1 = {
                            series: [{
                                name: 'عدد العقود',
                                data: @json($contractData)
                            }],
                            chart: {
                                height: 200,
                                type: 'bar',
                            },
                            plotOptions: {
                                bar: {
                                    columnWidth: '50%',
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                width: 0
                            },
                            grid: {
                                row: {
                                    colors: ['#fff', '#f2f2f2']
                                }
                            },
                            xaxis: {
                                labels: {
                                    rotate: -45,
                                },
                                categories: @json($details->pluck('name')->toArray()), // Pluck 'name' before converting to array
                                tickPlacement: 'on'
                            },
                            fill: {
                                type: 'gradient',
                                gradient: {
                                    shade: 'light',
                                    type: "horizontal",
                                    shadeIntensity: 0.25,
                                    gradientToColors: undefined,
                                    inverseColors: true,
                                    opacityFrom: 0.85,
                                    opacityTo: 0.85,
                                    stops: [50, 0, 100]
                                },
                            }
                        };

                        var options2 = {
                            series: [{
                                name: 'اجمالي قيمة العقود',
                                data: @json($contractValueData)
                            }],
                            chart: {
                                height: 200,
                                type: 'bar',
                            },
                            plotOptions: {
                                bar: {
                                    columnWidth: '50%',
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                width: 0
                            },
                            grid: {
                                row: {
                                    colors: ['#fff', '#f2f2f2']
                                }
                            },
                            xaxis: {
                                labels: {
                                    rotate: -45,
                                },
                                categories: @json($details->pluck('name')->toArray()), // Pluck 'name' before converting to array
                                tickPlacement: 'on'
                            },
                            fill: {
                                type: 'gradient',
                                gradient: {
                                    shade: 'light',
                                    type: "horizontal",
                                    shadeIntensity: 0.25,
                                    gradientToColors: undefined,
                                    inverseColors: true,
                                    opacityFrom: 0.85,
                                    opacityTo: 0.85,
                                    stops: [50, 0, 100]
                                },
                            }
                        };

                        var chart1 = new ApexCharts(document.querySelector("#chart{{ $index }}"), options1);
                        chart1.render();

                        var chart2 = new ApexCharts(document.querySelector("#chartt{{ $index }}"), options2);
                        chart2.render();
                    </script>

                </div>
            @endforeach

        </div>
    </div>
    <script>
        const counters = document.querySelectorAll('.counter');
        const duration = 2000;
        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const updates = Math.floor(duration / 10);
                const inc = Math.ceil(target / updates);
                if (count < target) {
                    counter.innerText = Math.min(count + inc, target);
                    setTimeout(updateCount, 10);
                } else {
                    counter.innerText = target;
                }
            };
            updateCount();
        });
    </script>
@endsection
