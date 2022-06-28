@extends('backend.layouts.master')

@section('content')

<div class="col-md-12">
    <table class="table table-hover table-striped">

        <div class="col-md-8">
            <form action="/search" method="get">
                @csrf
                <div class="input-group downlib">
                    <input type="search" name="search" class="form-control">
                    <span class="input-prepend">
                    <button type="submit" class=" btn btn-primary">Search</button>
                    <a href="{{route('doperegs.create')}}" class="btn btn-info">Add New Patient</a>
                </span>
                </div>
            </form>
        </div>

        <tr class="text-center bg-success">
            <th> S/N </th>
            <th> Reg ID </th>
            <th> Reg Date </th>
            <th> Patient Name </th>
            <th> Sex </th>
            <th> Contact No </th>
            <th> Date Of Birth </th>
            <th> Patient Image </th>
            <th> User Name </th>
            <th> Actions </th>

        </tr>
        {{--        @php $i=1;--}}
        {{--        @endphp--}}
        @foreach($doperegs as $key=> $dopereg)
            <tr>
                {{--                <td>{{$i++}}</td>--}}
                <td>{{$doperegs->firstitem()+$key}}</td>
                <td>{{$dopereg->id}}</td>
                <td> {{\Carbon\Carbon::parse ($dopereg->reg_date)->format('j F Y') }} </td>
                <td> {{$dopereg->name}} </td>
                <td> {{$dopereg->sex}} </td>
                <td> {{$dopereg->contact_no}} </td>
                <td> {{\Carbon\Carbon::parse ($dopereg->dob)->format('j F Y') }} </td>
                <td><img src="{{ URL::to('backend-lib/images/patient/'.$dopereg->image) }}" style="height: 100px; width: 100px;"></td>
                <td> {{$dopereg->user_name}} </td>
{{--                <td class="text-right"> {{$dope->dps_no}} </td>--}}
{{--                <td class="text-right"> {{$dope->fdr_amount}} </td>--}}


                <td>
                    <a href="{{URL::to('moneyreceipt/'.$dopereg->id)}}" class="btn btn-sm btn btn-success">Print</a>

                    {{--                    @can('customer_edit')--}}
                    <a href="{{URL::to('doperegs/'.$dopereg->id.'/edit')}}" class="btn btn-sm btn btn-info">Edit</a>
{{--                    @endcan--}}
{{--                    <a href="{{route('dopereg.show/.$dopereg->id)}}" class="btn btn-sm btn btn-info">show</a>--}}

{{--                        @can('customer_show')--}}
                        <a href="{{URL::to('doperegs/'.$dopereg->id)}}" class="btn btn-sm btn btn-success">Show</a>
{{--                        @endcan--}}

{{--                        @can('customer_delete')--}}
                        <form action="{{URL::to('doperegs/'.$dopereg->id)}}" method="post" class="float-left">
                        @csrf
                        @method('Delete')
                     <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Delete Account Information?')" type="submit" >Delete</button>
                    </form>
{{--                  @endcan--}}

                </td>

            </tr>
        @endforeach
    </table>
    {{$doperegs->links()}}
</div>
@endsection
