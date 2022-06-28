@extends('backend.layouts.master')

@section('breadcrumb')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> Centers </a></li>
                        <li class="breadcrumb-item"><a href="{{route('thana.index')}}"> Centers List </a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{route('thana.index')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-list"></i> Centers List </a>
            </div>
        </div> <!-- end row clearfix -->
    </div> <!-- end block-header -->
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2 class="text-uppercase text-center"> <strong> Add Police Station  </strong> </h2>
            </div>
            <div class="body">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger"> {{$error}} </div>
                    @endforeach
                @endif

                @if($formType == 'edit')
                    {!! Form::open(array('url' => "thana/$thana->id",'method' => 'PUT')) !!}
                @else
                    {!! Form::open(array('url' => "thana",'method' => 'POST')) !!}
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label("district_id", 'District ID')}}
                            {{Form::text('district_id', old('district_id') ? old('district_id') : (!empty($thana) ? $thana->district_id : null),
                                    ['class' => 'form-control','id' => 'district_id', 'placeholder' => 'Select District', 'required']
                            )}}
                        </div> <!-- end form-group -->

                        <div class="form-group">
                            {{ Form::label("district_name", 'District Name')}}
                            {{Form::select('district_Name', $districts , old('district_Name') ? old('district_Name') : (!empty($thana) ? $thana->district_Name : null),
                                    ['class' => 'form-control','id' => 'district_Name', 'placeholder' => 'Select District', 'required']
                            )}}
                        </div> <!-- end form-group -->

                        <div class="form-group">
                            {{ Form::label("thana_name", 'Thana Name')}}
                            {{Form::text('thana_name', old('thana_name') ? old('thana_name') : (!empty($thana) ? $thana->thana_name : null),
                                    ['class' => 'form-control','id' => 'thana_name', 'placeholder' => 'Enter Thana Name Here', 'required']
                            )}}
                        </div> <!-- end form-group -->
                    </div>
                </div> <!-- end row -->

                {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
                {!! Form::close() !!}

            </div><!-- end body -->
        </div> <!-- card -->
    </div> <!-- end col-md-12 -->
@endsection
