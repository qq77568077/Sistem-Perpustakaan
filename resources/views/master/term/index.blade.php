@extends('layouts.master')
@push('css')
    <link href="{{ asset('') }}vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('') }}vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="main-content">
        <div class="title">
            Master
        </div>
        <div class="content-wrapper">
            <div class="row same-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Syarat & Ketentuan</h4>
                        </div>
                        <div class="card-body">
                            @if (request()->user()->can('create master/term'))
                                <a type="button" class="btn btn-primary btn-sm mb-3 btn-add"
                                    href="{{ route('term.create') }}"> <i class="ti-plus"></i> Tambah</a>
                            @endif
                            <table class="table table-striped">
                                <tr align="center" valign="middle">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th width="280px">Action</th>
                                </tr>
                                @php $counter = 1; @endphp
                                @foreach ($data as $d)
                                    <tr align="center" valign="middle">
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $d->nama }}</td>
                                        <td>
                                            {{-- <a class="btn btn-info" href="{{ route('term.show', $d->id) }}">Show</a> --}}
                                            <a class="btn btn-primary" href="{{ route('term.edit', $d->id) }}">Edit</a>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['term.destroy', $d->id], 'style' => 'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="modalAction" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

    </div>
</div> --}}
@endsection

@push('js')
    <script src="{{ asset('') }}vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('') }}vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}vendor/sweetalert2/sweetalert2.all.min.js"></script>
@endpush
