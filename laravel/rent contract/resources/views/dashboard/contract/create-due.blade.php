@extends('dashboard.layouts.app')
@section('title', 'اضافة استحقاقات العقد')
@section('content')
    <div class="container-fluid">
        <div class="card mt-30 mb-50">
            <div class="card-header color-dark fw-500">
                <h4 class="text-capitalize">اضافة استحقاقات العقد</h4>
                <button class="btn btn-primary" id="add-mission-row">+ </button>
            </div>
            <div class="card-body">
                <form action="{{ route('contracts.storeDue', $id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="mission-row">
                        <div class="row">
                            <div class="mb-3 col-lg-4">
                                <label for="dueDate" class="form-label">تاريخ الاستحقاق</label>
                                <input name="deu[0][dueDate]" id="dueDate"
                                    class="form-control @error('deu.0.dueDate') is-invalid @enderror" type="date"
                                    value="{{ old('deu.0.dueDate') }}" required>
                                @error('deu.0.dueDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label for="dueInstallment" class="form-label">القسط المستحق</label>
                                <input name="deu[0][dueInstallment]" id="dueInstallment"
                                    class="form-control @error('deu.0.dueInstallment') is-invalid @enderror" type="number"
                                    step="0.01" min="0" value="{{ old('deu.0.dueInstallment') }}" required>
                                @error('deu.0.dueInstallment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label for="pay" class="form-label">المسدد</label>
                                <input name="deu[0][pay]" id="pay"
                                    class="form-control @error('deu.0.pay') is-invalid @enderror" type="number"
                                    step="0.01" min="0" value="{{ old('deu.0.pay', 0) }}">
                                @error('deu.0.pay')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="dueData" class="form-label">البيان</label>
                                <input name="deu[0][dueData]" id="dueData"
                                    class="form-control @error('deu.0.dueData') is-invalid @enderror" type="text"
                                    placeholder="أدخل تفاصيل البيان" value="{{ old('deu.0.dueData') }}">
                                @error('deu.0.dueData')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="duePdf" class="form-label">ملف PDF</label>
                                <input name="deu[0][duePdf]" id="duePdf"
                                    class="form-control @error('deu.0.duePdf') is-invalid @enderror" type="file"
                                    accept=".pdf">
                                @error('deu.0.duePdf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex" style="gap: 20px">
                        <button type="submit" class="btn btn-primary mt-3">تسجيل</button>
                        <a href="{{ route('contracts.show', $id) }}" class="btn btn-gray mt-3">ليس الان</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('#add-mission-row').on('click', function() {
            let missionCount = $('.mission-row').length;
            let newMissionRow = $('.mission-row .row:first').clone();
            console.log(newMissionRow);
            newMissionRow.find('input[name^="deu"]').each(function() {
                let name = $(this).attr('name');
                $(this).attr('name', name.replace(/\[0\]/, '[' + missionCount + ']'));
                $(this).val('');
            });
            newMissionRow.find('input[type="file"]').val('');
            let removebtn = `
            <div class="form-group col-12 text-right">
                <button type="button" class="btn btn-danger remove-mission-row">حذف</button>
            </div>`;
            newMissionRow.append(removebtn);
            let hr = `<hr class='my-3'>`
            $('.mission-row').append(hr);
            $('.mission-row').append(newMissionRow);
        });
        $(document).on('click', '.remove-mission-row', function() {
            $(this).closest('.mission-row').remove();
            $('.mission-row').each(function(index) {
                $(this).find('input, textarea, select').each(function() {
                    let name = $(this).attr('name');
                    if (name) {
                        $(this).attr('name', name.replace(/\[\d+\]/, '[' + index + ']'));
                    }
                });
            });
        });
    </script>

@endsection
