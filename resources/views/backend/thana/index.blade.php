@extends('backend.layouts.master')

@section('breadcrumb')
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"> MyPOS </a></li>
                        <li class="breadcrumb-item"><a href="{{route('thana.index')}}"> Police Station List </a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                @role('writter|admin')
                <a href="{{route('thana.create')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-plus"></i> Add Police Station </a>
                @endrole
            </div>
        </div> <!-- end row clearfix -->
    </div> <!-- end block-header -->
@endsection
@section('content')
    <div class="col-12">
        <div class="header"> <h6 class="text-uppercase text-center"> <strong> Police Station List  </strong> </h6> </div>
        <div class="row">
            @if(session('message'))
                <div class="col-8 alert alert-success posMessage"> {{session('message')}}  </div>
            @endif
        </div> <!-- end row -->
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing8">
                <thead>
                <tr>
                    <th> # </th>
                    <th> District Name </th>
                    <th> District ID </th>
                    <th> Police Station Name </th>
                    <th> Actions </th>
                </tr>
                </thead>
                <tbody>
                @foreach($pStations as $key=>$pStation)
                    <tr>
                        <td> {{$pStations->firstItem()+$key}} </td>
                        <td> {{$pStation->district_id}} </td>
                        <td> {{$pStation->district_name}} </td>
                        <td> {{$pStation->thana_name}} </td>
                        <td>

                            <a href="{{route('thana.edit', $pStation->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>
{{--                            @role('admin')--}}
                            {!! Form::open(array('url' => "thana/$pStation->id",'method' => 'delete', 'class'=>'actionButton')) !!}
                            {{ Form::button('<i class="fa fa-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm'])}}
                            {!! Form::close() !!}
{{--                            @endrole--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="float-right">
            {{$pStations->links()}}
        </div>
    </div> <!-- end col-12 -->
@endsection
