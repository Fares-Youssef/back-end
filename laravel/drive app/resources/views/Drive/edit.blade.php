@extends('layouts.app')

@section('content')
    <div class="container-xl my-5">
        <div class="table-responsive">
            <div class="card w-50 m-auto">
                <img src="{{ asset('drives/fake.png') }}" class="card-img-top" alt="...">
                <form method="POST" action="{{ route('drive.update', $drive->id) }}" class="card-body">
                    @csrf
                    <h5 class="card-title mt-2"><strong>File Name :</h5>
                    <input type="text" name="name" class="form-control mt-2 @error('name') is-invalid @enderror"
                        value="{{ $drive->name }}">
                    @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                    <h6 class="card-title mt-2"><strong>File Description :</h6>
                    <input type="text" name="title" class="form-control mt-2 @error('title') is-invalid @enderror"
                        value="{{ $drive->title }}">
                    @error('name')
                        <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                    <button class="btn btn-warning mt-2">Update <i class="fa-solid fa-pen-to-square"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection
