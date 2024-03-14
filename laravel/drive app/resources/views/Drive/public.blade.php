@extends('layouts.app')

@section('content')
    <div class="container-xl my-5">
        <div class="table-responsive">
            @if (Session::has('done'))
                <div id="alrt">

                </div>
            @endif
            @if (Session::has('remove'))
                <div class="alert alert-danger text-center" role="alert">
                    remove file done
                </div>
            @endif
            <div class="table-wrapper2">
                <div class="table-title ">
                    <div class="row border-bottom pb-3">
                        <div class="col-sm-5">

                            <h2>Public File</h2>

                        </div>
                        <div class="col-sm-7">
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th colspan="2">Shared By</th>
                            <th colspan="2">Name</th>
                            <th colspan="2">Description</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($drive as $item)
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td colspan="2">{{ $item->userName }}</td>
                                <td colspan="2">{{ $item->name }}</td>
                                <td colspan="2">{{ $item->title }}</td>
                                <td colspan="2">
                                    <a href="{{ route('drive.show', $item->id) }}" class="settings" title="settings"
                                        data-toggle="tooltip"><i class="material-icons">visibility</i></a>
                                </td>
                            </tr>
                        @empty
                            <th colspan="8">YOU DON'T HAVE DATA</th>
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('alrt').innerHTML = `<div class="alert alert-success text-center" role="alert">
                                                        edit file done
                                                    </div>`;
        setTimeout(function() {
            document.getElementById('alrt').innerHTML = '';
        }, 2000);
        document.getElementById('alrte').innerHTML = `<div class="alert alert-success text-center" role="alert">
                                                        remove file done
                                                    </div>`;
        setTimeout(function() {
            document.getElementById('alrte').innerHTML = '';
        }, 2000);
    </script>
@endsection
