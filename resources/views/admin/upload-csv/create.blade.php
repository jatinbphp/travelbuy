@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">

    @include('admin.common.header', [
        'menu' => $menu,
        'breadcrumb' => [
            ['route' => route('user.dashboard'), 'title' => 'Dashboard'],
        ],
        'active' => $menu
    ])

    <section class="content">
        @include ('admin.common.error')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        @include('admin.common.card-header', ['title' => '' . $menu])
                    </div>
                    {!! Form::open(['url' => route('upload-csv.store'), 'id' => 'usersForm', 'class' => 'form-horizontal','files'=>true]) !!}
                        <div class="card-body">
                            {!! Form::hidden('redirects_to', URL::previous()) !!}

                            <div class="row">
                                <div class="col-md-3 documents-upload mb-1" id="documents_1">
                                    <div class="file-upload-box">
                                        <h2>Upload</h2>

                                        {!! Form::file('file', ['class' => 'file-input', 'id' => 'fileInput_1', 'accept' => '.csv']) !!}

                                        <label for="fileInput_1" class="upload-label mb-0"><span class="btn btn-sm btn-info"><i class="fa fa-upload"></i> Choose CSV</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    @include('admin.common.errors', ['field' => 'file'])
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ asset('uploads/Sample-CSV-file.csv') }}" download class="btn btn-sm btn-default"><i class="fa fa-download pr-1"></i> Download Sample CSV File</a>

                            <button class="btn btn-sm btn-info float-right" type="submit"><i class="fa fa-upload pr-1"></i> Upload</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection