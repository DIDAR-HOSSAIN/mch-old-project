
@extends('backend.layouts.master')

{{--@section('breadcrumb')--}}
{{--    <div class="block-header">--}}
{{--        <div class="row clearfix">--}}
{{--            <div class="col-md-6 col-sm-12">--}}
{{--                <nav aria-label="breadcrumb">--}}
{{--                    <ol class="breadcrumb">--}}
{{--                        <li class="breadcrumb-item"><a href="#"> Customer List </a></li>--}}
{{--                        <li class="breadcrumb-item"><a href="{{route('customers.index')}}">  Customer List </a></li>--}}
{{--                    </ol>--}}
{{--                </nav>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 col-sm-12 text-right">--}}
{{--                @role('writter|admin')--}}
{{--                <a href="{{route('customers.create')}}" class="btn btn-group-lg btn-warning"> <i class="fa fa-plus"></i> Add Customer </a>--}}
{{--                @endrole--}}
{{--            </div>--}}
{{--        </div> <!-- end row clearfix -->--}}
{{--    </div> <!-- end block-header -->--}}
{{--@endsection--}}

@section('content')
    <div class="col-12">
        <div class="header"> <h6 class="text-uppercase text-center"> <strong> Patient Details  </strong> </h6> </div>
        <div class="row">
            @if(session('message'))
                <div class="col-8 alert alert-success posMessage"> {{session('message')}}  </div>
            @endif
        </div> <!-- end row -->
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing8">


                <tbody>

                <tr>
                    <th> Sample ID </th>
                    <td> {{$result->id}}</td>
                </tr>

                <tr>
                    <th> Patient ID </th>
                    <td> {{$result->pid}}</td>
                </tr>

                <tr>
                    <th> Sample ID </th>
                    <td> {{$result->sid}}</td>
                </tr>

                <tr>
                    <th> Patient Name </th>
                    <td> {{$result->name}}</td>
                </tr>

                <tr>
                    <th> Sample Collected By </th>
                    <td> {{$result->entry_date}}</td>
                </tr>

                <tr>
                    <th> Symptoms </th>
                    <td> {{$result->date_of_test_result}}</td>
                </tr>

                <tr>
                    <th> Sample Classification </th>
                    <td> {{$result->result}}</td>
                </tr>

                <tr>
                    <th> Specimen Details </th>
                    <td> {{$result->delivery_status}}</td>
                </tr>

                <tr>
                    <th> Remarks </th>
                    <td> {{$result->remarks}}</td>
                </tr>

                <tr>
                    <th> User Name </th>
{{--                    <td>{{ucfirst(trans(\Illuminate\Support\Facades\Auth::user()->name))}} </td>--}}
                </tr>

                <tr>
                    <th> Actions </th>

                    <td>
{{--                        @can('customer_edit')--}}
                            <a href="{{route('results.edit', $result->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>
{{--                        @endcan--}}

{{--                        @can('customer_show')--}}
                        <a href="{{route('results.show', $result->id)}}" class="btn btn-outline-success btn-sm actionButton"> <i class="fa fa-eye"></i> </a>
{{--                        @endcan--}}

{{--                        @can('customer_delete')--}}
                                {!! Form::open(array('url' => "results/$result->id",'method' => 'delete', 'class'=>'actionButton')) !!}
                                {{ Form::button('<i class="fa fa-remove"></i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm float left'])}}
{{--                        @endcan--}}

                        {!! Form::close() !!}

                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div> <!-- end col-12 -->
@endsection

