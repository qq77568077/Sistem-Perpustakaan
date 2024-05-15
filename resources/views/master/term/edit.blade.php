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
                            <h4>Edit Syarat & Ketentuan</h4>
                        </div>
                        <div class="card-body">
                            @if (request()->user()->can('create master/term'))
                                <a type="button" class="btn btn-primary btn-sm mb-3 btn-add"
                                    href="{{ route('term.index') }}"> <i class="ti-plus"></i> Back</a>
                            @endif
                            {!! Form::model($data, ['method' => 'PATCH', 'route' => ['term.update', $data->id]]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                    <div class="form-group">
                                        <strong>Nama:</strong>
                                        {!! Form::text('nama', null, ['placeholder' => 'Nama', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                    <div class="form-group">
                                        <strong>Syarat:</strong>
                                        {!! Form::textarea('syarat', null, ['placeholder' => 'Syarat', 'class' => 'form-control', 'id' => 'syarat']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
@endsection

@push('js')
    <script src="{{ asset('') }}vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('') }}vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}vendor/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('syarat');
        });
    </script>
@endpush
