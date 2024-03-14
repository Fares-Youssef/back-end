@extends('layouts.app')

@section('content')
    <div class="container-xl my-5">
        <div class="table-responsive">
            @if (Session::has('done'))
                <div id="alrt">

                </div>
            @endif
            <div class="table-wrapper2">
                <div class="table-title ">
                    <div class="row border-bottom pb-3">
                        <div class="col-sm-5">

                            <h2>Upload File</h2>
                        </div>
                        <div class="col-sm-7">
                        </div>
                    </div>
                </div>
                <form action="{{ route('drive.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class=" mt-3">
                        <input name="name" type="text" value="{{old('name')}}"
                            class="form-control rounded-0 @error('name') is-invalid @enderror" placeholder="File title"
                            aria-label="Username" aria-describedby="addon-wrapping">
                        @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <input name="title" type="text" value="{{old('title')}}"
                            class="form-control rounded-0 @error('title') is-invalid @enderror"
                            placeholder="File description" aria-label="Username" aria-describedby="addon-wrapping">
                        @error('title')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <input name="file" type="file" value="{{old('file')}}"
                            class="form-control rounded-0 @error('file') is-invalid @enderror" aria-label="Username"
                            aria-describedby="addon-wrapping">
                        @error('file')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <button name="send" class="btn btn-primary mt-3 rounded-0">Upload <i
                            class="fa-solid fa-upload"></i></button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('alrt').innerHTML = `<div class="alert alert-success" role="alert">
                                                        uploaded file done
                                                    </div>`;
        setTimeout(function() {
            document.getElementById('alrt').innerHTML = '';
        }, 2000);
    </script>
@endsection
