@extends('layouts.app')

@section('content')
    <div class="container-xl my-5">
        <div class="table-responsive">
            <div class="card w-50 m-auto">
                <img src="{{ asset('drives/fake.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><strong>File Title :</strong> {{ $drive->name }} </h5>
                    <h6><strong>File Description :</strong> {{ $drive->title }}</h6>
                    <h6><strong>File Name :</strong> {{ $drive->file }}</h6>
                    <div class="input-group align-items-center justify-content-center">
                        <a href="/drives/{{ $drive->file }}" class="btn btn-success w-50" target="_blanck">show <i
                                class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('drive.download', $drive->id) }}" class="btn btn-primary w-50">Download <i
                                class="fa-solid fa-download"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
