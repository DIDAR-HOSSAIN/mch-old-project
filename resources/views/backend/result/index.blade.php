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
                    <a href="{{route('results.create')}}" class="btn btn-info">Add New Result</a>
                </span>
                </div>
            </form>
        </div>

        <tr class="text-center bg-success">
            <th> S/N </th>
            <th> Result ID </th>
            <th> Patient ID </th>
            <th> Sample ID </th>
            <th> Name </th>
            <th> Entry Date </th>
            <th> Sample Collection Date </th>
            <th> Result </th>
            <th> Delivery Status </th>
            <th> Remarks </th>
            <th> User Name </th>
            <th> Actions </th>

        </tr>
        {{--        @php $i=1;--}}
        {{--        @endphp--}}
        @foreach($results as $key=> $result)
            <tr>
                {{--                <td>{{$i++}}</td>--}}
                <td>{{$results->firstitem()+$key}}</td>
                <td>{{$result->id}}</td>
                <td>{{$result->pid}}</td>
                <td>{{$result->sid}}</td>
                <td> {{$result->name}} </td>
                <td> {{\Carbon\Carbon::parse ($result->entry_date)->format('j F Y') }} </td>
                <td> {{\Carbon\Carbon::parse ($result->sample_collection_date)->format('j F Y') }} </td>
                <td> {{$result->result}} </td>
                <td> {{$result->delivery_status}} </td>
                <td> {{$result->remarks}} </td>
                <td> {{$result->user_name}} </td>
{{--                <td class="text-right"> {{$dope->dps_no}} </td>--}}
{{--                <td class="text-right"> {{$dope->fdr_amount}} </td>--}}


                <td>
{{--                    @can('customer_edit')--}}
                    <a href="{{URL::to('results/'.$result->id.'/edit')}}" class="btn btn-sm btn btn-info">Edit</a>
{{--                    @endcan--}}
{{--                    <a href="{{route('dopereg.show/.$dopereg->id)}}" class="btn btn-sm btn btn-info">show</a>--}}

{{--                        @can('customer_show')--}}
                        <a href="{{URL::to('results/'.$result->id)}}" class="btn btn-sm btn btn-success">Show</a>
{{--                        @endcan--}}

{{--                        @can('customer_delete')--}}
                        <form action="{{URL::to('results/'.$result->id)}}" method="post" class="float-left">
                        @csrf
                        @method('Delete')
                     <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Delete Account Information?')" type="submit" >Delete</button>
                    </form>
{{--                  @endcan--}}

                </td>

            </tr>
        @endforeach
    </table>
    {{$results->links()}}
</div>
@endsection
