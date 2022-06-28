
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
                    <th> Test ID </th>
                    <td> {{$test->dope_id}}</td>
                </tr>

                <tr>
                    <th> Entry Date </th>
                    <td> {{$test->entry_date}}</td>
                </tr>

                <tr>
                    <th> Test Name </th>
                    <td> {{$test->test_name}}</td>
                </tr>

                <tr>
                    <th> Amount </th>
                    <td> {{$test->amount}}</td>
                </tr>

                <tr>
                    <th> User Name </th>
{{--                    <td>{{ucfirst(trans(\Illuminate\Support\Facades\Auth::user()->name))}} </td>--}}
                </tr>

                <tr>
                    <th> Actions </th>

                    <td>
{{--                        @can('customer_edit')--}}
                            <a href="{{route('tests.edit', $test->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>
{{--                        @endcan--}}

{{--                        @can('customer_show')--}}
                        <a href="{{route('tests.show', $test->id)}}" class="btn btn-outline-success btn-sm actionButton"> <i class="fa fa-eye"></i> </a>
{{--                        @endcan--}}

{{--                        @can('customer_delete')--}}
                                {!! Form::open(array('url' => "tests/$test->id",'method' => 'delete', 'class'=>'actionButton')) !!}
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

