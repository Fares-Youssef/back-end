@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center py-4">
            <div class="table-responsivee">
                <div class="table-wrapper2">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-lg-8">
                                <h2>تسجيل استحقاقات العقد رقم : {{ $buildingNum }}</h2>
                            </div>
                            <div class="col-lg-4 d-flex justify-content-end">
                                <button onclick="add()" id="addBtn" class="btn btn-secondary"
                                    data-toggle="modal"><i class="material-icons">&#xe147;</i> <span>اضافة
                                        استحقاق</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-2 ">
                        <div class=" col-lg-4">
                            <label class="form-label">رقم العقد</label>
                        </div>
                        <div class=" col-lg-4">
                            <label class="form-label">تاريخ الاستحقاق</label>
                        </div>
                        <div class=" col-lg-4">
                            <label class="form-label">القسط المستحق</label>
                        </div>
                    </div>
                    <form action="{{ route('due.newStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div id="form">

                        </div>
                        <div class="form-floating d-none">
                            <textarea class="form-control"name="data"  placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Comments</label>
                        </div>
                        <div class="py-3 border-top">
                            <button type="submit" onclick="jsonFile()" class="btn btn-primary w-100">تسجيل الاستحقاق</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        var x = [1];

        if (x.length == 1) {
            var productBox = ""
            productBox += `
                            <div class="row pb-2 ">
                                <div class="mb-3 col-lg-4">
                                    <input  class="form-control" disabled type="text" value="{{ $buildingNum }}">
                                    <input id="contractNum0"  class="form-control d-none" type="text" value="{{ $buildingNum }}">
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <input  id="dueDate0" required class="form-control" type="date">
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <input id='dueInstallment0' required  class="form-control" type="number">
                                </div>
                            </div>
            `
            document.getElementById('form').innerHTML = productBox;
        }

        function add() {
            x.push("1");
            var productBox = ""
            for (let i = 0; i < x.length; i++) {
                productBox += `
                            <div class="row pb-2 ">
                                <div class="mb-3 col-lg-4">
                                    <input  class="form-control" disabled type="text" value="{{ $buildingNum }}">
                                    <input id="contractNum${i}"  class="form-control d-none" type="text" value="{{ $buildingNum }}">
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <input id="dueDate${i}" required  class="form-control" type="date">
                                </div>
                                <div class="mb-3 col-lg-4">
                                    <input id='dueInstallment${i}' required  class="form-control" type="number">
                                </div>
                            </div>
            `
                document.getElementById('form').innerHTML = productBox;

            }
        }

        // // json file
        function jsonFile() {
            var file = [];
            for (let i = 0; i < x.length; i++) {
                contractNum = document.getElementById(`contractNum${i}`).value;
                dueDate = document.getElementById(`dueDate${i}`).value;
                dueInstallment = document.getElementById(`dueInstallment${i}`).value;
                var newFile = {
                    contractNum,
                    dueDate,
                    dueInstallment
                }
                file.push(newFile)
            }
            var fares = JSON.stringify(file)
            document.getElementById("floatingTextarea").value = fares
            console.log(file);
        }
    </script>
@endsection
