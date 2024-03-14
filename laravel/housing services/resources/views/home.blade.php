@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth::user()->type == "مدير موقع")
        <div class="container">
            <script>
                A = [];
                I = [];
                P = [];
                S = [];
                B = [];
                F = [];
            </script>
            @foreach ($ARABICValue as $item)
                <script>
                    a = {{ $item->value }}
                    A.push(a)
                </script>
            @endforeach
            @foreach ($INDIANCValue as $item)
                <script>
                    i = {{ $item->value }}
                    I.push(i)
                </script>
            @endforeach
            @foreach ($PAKISTANIValue as $item)
                <script>
                    p = {{ $item->value }}
                    P.push(p)
                </script>
            @endforeach
            @foreach ($SRIValue as $item)
                <script>
                    s = {{ $item->value }}
                    S.push(s)
                </script>
            @endforeach
            @foreach ($BENGALIValue as $item)
                <script>
                    b = {{ $item->value }}
                    B.push(b)
                </script>
            @endforeach
            @foreach ($FILIPINOValue as $item)
                <script>
                    f = {{ $item->value }}
                    F.push(f)
                </script>
            @endforeach
            <div class="row pt-4">
                <div class="col-lg-4">
                    <div>
                        <h3 class="text-center m-0">
                            قيمة الاشتراكات
                        </h3>
                        <canvas id="myChart4"></canvas>
                    </div>
                </div>
                <div class="col-lg-4 row justfiy-content-center">
                    <div>
                        <h3 class="text-center m-0 pb-4">
                            عدد المشتركين
                        </h3>
                        <canvas class="" id="myChart5" height="400px" width="400px"></canvas>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <h3 class="text-center m-0 pb-4">
                            الجنسيات
                        </h3>
                        <canvas id="myChart6" height="426px" width="400px"></canvas>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row py-3">
                <div class="col-12">
                    <div class="card" id="table">
                        <div class="table-responsive">
                            <table class="table table-vcenter table-mobile-md card-table text-center">
                                <thead>
                                    <tr>
                                        <th>الجنسية\الميز</th>
                                        <th>العربي-Arabic</th>
                                        <th>الهندي-Indian</th>
                                        <th>باكستانى-Pakistani</th>
                                        <th>سريلانكي-Sri Lankan</th>
                                        <th>بنجالي-Bengali</th>
                                        <th>فلبينى-Filipino</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>British</td>
                                        <td>{{ $BritishJoinA }}</td>
                                        <td>{{ $BritishJoinI }}</td>
                                        <td>{{ $BritishJoinP }}</td>
                                        <td>{{ $BritishJoinS }}</td>
                                        <td>{{ $BritishJoinB }}</td>
                                        <td>{{ $BritishJoinF }}</td>
                                    </tr>
                                    <tr>
                                        <td>Saudi</td>
                                        <td>{{ $SaudiJoinA }}</td>
                                        <td>{{ $SaudiJoinI }}</td>
                                        <td>{{ $SaudiJoinP }}</td>
                                        <td>{{ $SaudiJoinS }}</td>
                                        <td>{{ $SaudiJoinB }}</td>
                                        <td>{{ $SaudiJoinF }}</td>
                                    </tr>
                                    <tr>
                                        <td>Senegalese</td>
                                        <td>{{ $SenegaleseJoinA }}</td>
                                        <td>{{ $SenegaleseJoinI }}</td>
                                        <td>{{ $SenegaleseJoinP }}</td>
                                        <td>{{ $SenegaleseJoinS }}</td>
                                        <td>{{ $SenegaleseJoinB }}</td>
                                        <td>{{ $SenegaleseJoinF }}</td>
                                    </tr>
                                    <tr>
                                        <td>Turkish</td>
                                        <td>{{ $TurkishJoinA }}</td>
                                        <td>{{ $TurkishJoinI }}</td>
                                        <td>{{ $TurkishJoinP }}</td>
                                        <td>{{ $TurkishJoinS }}</td>
                                        <td>{{ $TurkishJoinB }}</td>
                                        <td>{{ $TurkishJoinF }}</td>
                                    </tr>
                                    <tr>
                                        <td>Vietnamese</td>
                                        <td>{{ $VietnameseJoinA }}</td>
                                        <td>{{ $VietnameseJoinI }}</td>
                                        <td>{{ $VietnameseJoinP }}</td>
                                        <td>{{ $VietnameseJoinS }}</td>
                                        <td>{{ $VietnameseJoinB }}</td>
                                        <td>{{ $VietnameseJoinF }}</td>
                                    </tr>
                                    <tr>
                                        <td>بنجالي-Bengali</td>
                                        <td>{{ $BengaliJoinA }}</td>
                                        <td>{{ $BengaliJoinI }}</td>
                                        <td>{{ $BengaliJoinP }}</td>
                                        <td>{{ $BengaliJoinS }}</td>
                                        <td>{{ $BengaliJoinB }}</td>
                                        <td>{{ $BengaliJoinF }}</td>
                                    </tr>
                                    <tr>
                                        <td>سريلانكي-Sri Lankan</td>
                                        <td>{{ $SriLankanJoinA }}</td>
                                        <td>{{ $SriLankanJoinI }}</td>
                                        <td>{{ $SriLankanJoinP }}</td>
                                        <td>{{ $SriLankanJoinS }}</td>
                                        <td>{{ $SriLankanJoinB }}</td>
                                        <td>{{ $SriLankanJoinF }}</td>
                                    </tr>
                                    <tr>
                                        <td>سوداني-Sudanese</td>
                                        <td>{{ $SudaneseJoinA }}</td>
                                        <td>{{ $SudaneseJoinI }}</td>
                                        <td>{{ $SudaneseJoinP }}</td>
                                        <td>{{ $SudaneseJoinS }}</td>
                                        <td>{{ $SudaneseJoinB }}</td>
                                        <td>{{ $SudaneseJoinF }}</td>
                                    </tr>
                                    <tr>
                                        <td>سورى-Syrian</td>
                                        <td>{{ $SyrianJoinA }}</td>
                                        <td>{{ $SyrianJoinI }}</td>
                                        <td>{{ $SyrianJoinP }}</td>
                                        <td>{{ $SyrianJoinS }}</td>
                                        <td>{{ $SyrianJoinB }}</td>
                                        <td>{{ $SyrianJoinF }}</td>
                                    </tr>
                                    <tr>
                                        <td>مصري-Egyptian</td>
                                        <td>{{ $egyptJoinA }}</td>
                                        <td>{{ $egyptJoinI }}</td>
                                        <td>{{ $egyptJoinP }}</td>
                                        <td>{{ $egyptJoinS }}</td>
                                        <td>{{ $egyptJoinB }}</td>
                                        <td>{{ $egyptJoinF }}</td>
                                    </tr>
                                    <tr>
                                        <td>هندي-Indian</td>
                                        <td>{{ $IndianJoinA }}</td>
                                        <td>{{ $IndianJoinI }}</td>
                                        <td>{{ $IndianJoinP }}</td>
                                        <td>{{ $IndianJoinS }}</td>
                                        <td>{{ $IndianJoinB }}</td>
                                        <td>{{ $IndianJoinF }}</td>
                                    </tr>
                                    <tr>
                                        <td>يمنى-Yemeni</td>
                                        <td>{{ $YemeniJoinA }}</td>
                                        <td>{{ $YemeniJoinI }}</td>
                                        <td>{{ $YemeniJoinP }}</td>
                                        <td>{{ $YemeniJoinS }}</td>
                                        <td>{{ $YemeniJoinB }}</td>
                                        <td>{{ $YemeniJoinF }}</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>عدد المشتركين</td>
                                        <td>{{ $ARABICCount }}</td>
                                        <td>{{ $INDIANCount }}</td>
                                        <td>{{ $PAKISTANICount }}</td>
                                        <td>{{ $SRICount }}</td>
                                        <td>{{ $BENGALICount }}</td>
                                        <td>{{ $FILIPINOCount }}</td>
                                    </tr>
                                    <tr>
                                        <td>اجمالي عدد المشتركين</td>
                                        <td colspan="6">
                                            {{ $ARABICCount + $INDIANCount + $PAKISTANICount + $SRICount + $BENGALICount + $FILIPINOCount }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>قيمة الاشتراكات</td>
                                        <td id="one"></td>
                                        <td id="two"></td>
                                        <td id="three"></td>
                                        <td id="four"></td>
                                        <td id="five"></td>
                                        <td id="six"></td>
                                    </tr>
                                    <tr>
                                        <td>اجمالي قيمة الاشتراكات</td>
                                        <td colspan="6" id="seven"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <h2 class="text-center pb-3">
                    بيانات العمالة
                </h2>
                <div class="col-lg-6">
                    <div>
                        <canvas id="myChart" style="height: 50vh !important"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                        <canvas class="pb-3" id="myChart2" style="height: 50vh !important"></canvas>
                    </div>
                    <div>
                        <canvas id="myChart3" style="height: 50vh !important"></canvas>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="text-center mt-3">
            <h1>
                مرحبا بك في الصفحة الرئيسية
            </h1>
        </div>
        @endif


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            let sumA = 0;
            let sumI = 0;
            let sumP = 0;
            let sumS = 0;
            let sumB = 0;
            let sumF = 0;
            for (let i = 0; i < A.length; i++) {
                sumA += A[i];
            }
            for (let i = 0; i < I.length; i++) {
                sumI += I[i];
            }
            for (let i = 0; i < P.length; i++) {
                sumP += P[i];
            }
            for (let i = 0; i < S.length; i++) {
                sumS += S[i];
            }
            for (let i = 0; i < B.length; i++) {
                sumB += B[i];
            }
            for (let i = 0; i < F.length; i++) {
                sumF += F[i];
            }
            document.getElementById('one').innerHTML = sumA;
            document.getElementById('two').innerHTML = sumI;
            document.getElementById('three').innerHTML = sumP;
            document.getElementById('four').innerHTML = sumS;
            document.getElementById('five').innerHTML = sumB;
            document.getElementById('six').innerHTML = sumF;
            document.getElementById('seven').innerHTML = sumA + sumI + sumP + sumS + sumB + sumF;
            const ctx = document.getElementById('myChart');
            const ctx2 = document.getElementById('myChart2');
            const ctx3 = document.getElementById('myChart3');
            const ctx4 = document.getElementById('myChart4');
            const ctx5 = document.getElementById('myChart5');
            const ctx6 = document.getElementById('myChart6');

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['British', 'Saudi', 'Senegalese', 'Turkish', 'Vietnamese', 'بنجالي-Bengali',
                        'سريلانكي-Sri Lankan', 'سوداني-Sudanese', 'سورى-Syrian', 'مصري-Egyptian', 'هندي-Indian',
                        'يمنى-Yemeni'
                    ],
                    datasets: [{
                        label: "count",
                        data: [{{ $British }}, {{ $Saudi }}, {{ $Senegalese }},
                            {{ $Turkish }}, {{ $Vietnamese }}, {{ $Bengali }},
                            {{ $SriLankan }}, {{ $Sudanese }}, {{ $Syrian }},
                            {{ $egypt }}, {{ $Indian }}, {{ $Yemeni }},
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ['هندي-Indian', 'Saudi', 'مصري-Egyptian', 'بنجالي-Bengali', 'يمنى-Yemeni',
                        'سوداني-Sudanese',
                    ],
                    datasets: [{
                        label: "count",
                        data: [{{ $Indian }}, {{ $Saudi }}, {{ $egypt }},
                            {{ $Bengali }}, {{ $Yemeni }}, {{ $Sudanese }},
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
            new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels: [
                        'British', 'Senegalese', 'سورى-Syrian', 'Turkish', 'Vietnamese',
                        'سريلانكي-Sri Lankan'
                    ],
                    datasets: [{
                        label: "count",
                        data: [{{ $British }}, {{ $Senegalese }}, {{ $Syrian }},
                            {{ $Turkish }}, {{ $Vietnamese }}, {{ $SriLankan }},
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
            new Chart(ctx4, {
                type: 'doughnut',
                data: {
                    labels: ['العربي-ARABIC', 'الهندي-INDIAN', 'باكستانى-PAKISTANI',
                        'سريلانكي-SRI LANKAN', 'بنجالي-BENGALI', 'فلبينى-FILIPINO'
                    ],
                    datasets: [{
                        label: "value",
                        data: [sumA, sumI, sumP, sumS, sumB, sumF],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            new Chart(ctx5, {
                type: 'bar',
                data: {
                    labels: ['العربي-ARABIC', 'الهندي-INDIAN', 'باكستانى-PAKISTANI',
                        'سريلانكي-SRI LANKAN', 'بنجالي-BENGALI', 'فلبينى-FILIPINO'
                    ],
                    datasets: [{
                        label: "count",
                        data: [{{ $ARABICCount }}, {{ $INDIANCount }}, {{ $PAKISTANICount }},
                            {{ $SRICount }}, {{ $BENGALICount }}, {{ $FILIPINOCount }},
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        },

                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    responsive: false,


                }
            });
            new Chart(ctx6, {
                type: 'bar',
                data: {
                    labels: ['British', 'Saudi', 'Senegalese', 'Turkish', 'Vietnamese', 'بنجالي-Bengali',
                        'سريلانكي-Sri Lankan', 'سوداني-Sudanese', 'سورى-Syrian', 'مصري-Egyptian', 'هندي-Indian',
                        'يمنى-Yemeni'
                    ],
                    datasets: [{
                        label: "count",
                        data: [{{ $British2 }}, {{ $Saudi2 }}, {{ $Senegalese2 }},
                            {{ $Turkish2 }}, {{ $Vietnamese2 }}, {{ $Bengali2 }},
                            {{ $SriLankan2 }}, {{ $Sudanese2 }}, {{ $Syrian2 }},
                            {{ $egypt2 }}, {{ $Indian2 }}, {{ $Yemeni2 }},
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    responsive: false,

                }
            });
        </script>
    </div>
@endsection
