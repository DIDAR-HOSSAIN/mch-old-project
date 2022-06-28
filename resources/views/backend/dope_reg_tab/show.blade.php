
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
                    <th> Reg ID </th>
                    <td> {{$dopereg->id}}</td>
                </tr>

                <tr>
                    <th> Reg Date </th>
                    <td> {{$dopereg->reg_date}}</td>
                </tr>

                <tr>
                    <th> Patient Name </th>
                    <td> {{$dopereg->name}}</td>
                </tr>

                <tr>
                    <th> Sex </th>
                    <td> {{$dopereg->sex}}</td>
                </tr>

                <tr>
                    <th> Sex </th>
                    <td> {{$dopereg->passport_no}}</td>
                </tr>

                <tr>
                    <th> Address </th>
                    <td> {{$dopereg->address}}</td>
                </tr>

                <tr>
                    <th> District </th>
                    <td> {{$dopereg->district}}</td>
                </tr>

                <tr>
                    <th> Thana </th>
                    <td> {{$dopereg->thana}}</td>
                </tr>

                <tr>
                    <th> Contact No </th>
                    <td> {{$dopereg->contact_no}}</td>
                </tr>

                <tr>
                    <th> Patient Image </th>
                    <td><img src="{{ URL::to('backend-lib/images/patient/'.$dopereg->image) }}" style="height: 100px; width: 100px;"></td>

                </tr>

                <tr>
                    <th> Date Of Birth </th>
                    <td> {{$dopereg->dob}}</td>
                </tr>

                <tr>
                    <th> Age </th>
                    <td> {{$dopereg->age}}</td>
                </tr>

                <tr>
                    <th> Nid No </th>
                    <td> {{$dopereg->nid}}</td>
                </tr>

                <tr>
                    <th> Collection Type </th>
                    <td> {{$dopereg->collection_type}}</td>
                </tr>

                <tr>
                    <th> Reference </th>
                    <td> {{$dopereg->reference}}</td>
                </tr>

                <tr>
                    <th> Reg Fee </th>
                    <td> {{$dopereg->reg_fee}}</td>
                </tr>

                <tr>
                    <th> Discount </th>
                    <td> {{$dopereg->discount}}</td>
                </tr>

                <tr>
                    <th> Total </th>
                    <td> {{$dopereg->total}}</td>
                </tr>

                <tr>
                    <th> Paid </th>
                    <td> {{$dopereg->paid}}</td>
                </tr>

                <tr>
                    <th> Payment Type </th>
                    <td> {{$dopereg->payment_type}}</td>
                </tr>

                <tr>
                    <th> Account Head </th>
                    <td> {{$dopereg->account_head}}</td>
                </tr>

                <tr>
                    <th> User Name </th>
{{--                    <td>{{ucfirst(trans(\Illuminate\Support\Facades\Auth::user()->name))}} </td>--}}
                </tr>

                <tr>
                    <th> Actions </th>

                    <td>
{{--                        @can('customer_edit')--}}
                            <a href="{{route('doperegs.edit', $dopereg->id)}}" class="btn btn-outline-warning btn-sm actionButton"> <i class="fa fa-pencil"></i> </a>
{{--                        @endcan--}}

{{--                        @can('customer_show')--}}
                        <a href="{{route('doperegs.show', $dopereg->id)}}" class="btn btn-outline-success btn-sm actionButton"> <i class="fa fa-eye"></i> </a>
{{--                        @endcan--}}

{{--                        @can('customer_delete')--}}
                                {!! Form::open(array('url' => "doperegs/$dopereg->id",'method' => 'delete', 'class'=>'actionButton')) !!}
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

