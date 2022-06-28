@extends('backend.layouts.master')

@section('breadcrumb')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> City </a></li>
                        <li class="breadcrumb-item"><a href="{{route('district.index')}}"> City List </a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <a href="{{route('district.index')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-list"></i> District List </a>
            </div>
        </div> <!-- end row clearfix -->
    </div> <!-- end block-header -->
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2 class="text-uppercase text-center"> <strong> Add District  </strong> </h2>
            </div>
            <div class="body">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger"> {{$error}} </div>
                    @endforeach
                @endif

                @if($formType == 'edit')
                    {!! Form::open(array('url' => "district/$district->id",'method' => 'PUT')) !!}
                @else
                    {!! Form::open(array('url' => "district",'method' => 'POST')) !!}
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label("district_name", 'District Name')}}
                            {{Form::text('district_name', old('district_name') ? old('district_name') : (!empty($district) ? $district->district_name : null),
                                    ['class' => 'form-control','id' => 'district_name', 'placeholder' => 'Enter District Name Here']
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
