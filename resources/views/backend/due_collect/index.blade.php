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
                    <a href="{{route('dues.create')}}" class="btn btn-info">Due Collect</a>
                </span>
                </div>
            </form>
        </div>

        <tr class="text-center bg-success">
            <th> S/N </th>
            <th> Patient ID </th>
            <th> Name </th>
            <th> Entry Date </th>
            <th>Collection Date </th>
            <th> Due Amount </th>
            <th> Collection Amount </th>
            <th> Remarks </th>
            <th> User Name </th>
            <th> Actions </th>

        </tr>
        {{--        @php $i=1;--}}
        {{--        @endphp--}}
        @foreach($dues as $key=> $due)
            <tr>
                {{--                <td>{{$i++}}</td>--}}
                <td>{{$dues->firstitem()+$key}}</td>
                <td>{{$due->id}}</td>
                <td>{{$due->pid}}</td>
                <td> {{$due->name}} </td>
                <td> {{\Carbon\Carbon::parse ($due->entry_date)->format('j F Y') }} </td>
                <td> {{\Carbon\Carbon::parse ($due->collection_date)->format('j F Y') }} </td>
                <td> {{$due->due_amount}} </td>
                <td> {{$due->collection_amount}} </td>
                <td> {{$due->remarks}} </td>
                <td> {{$due->user_name}} </td>
{{--                <td class="text-right"> {{$dope->dps_no}} </td>--}}
{{--                <td class="text-right"> {{$dope->fdr_amount}} </td>--}}


                <td>
{{--                    @can('customer_edit')--}}
                    <a href="{{URL::to('dues/'.$due->id.'/edit')}}" class="btn btn-sm btn btn-info">Edit</a>
{{--                    @endcan--}}
{{--                    <a href="{{route('dopereg.show/.$dopereg->id)}}" class="btn btn-sm btn btn-info">show</a>--}}

{{--                        @can('customer_show')--}}
                        <a href="{{URL::to('dues/'.$due->id)}}" class="btn btn-sm btn btn-success">Show</a>
{{--                        @endcan--}}

{{--                        @can('customer_delete')--}}
                        <form action="{{URL::to('dues/'.$due->id)}}" method="post" class="float-left">
                        @csrf
                        @method('Delete')
                     <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Delete Account Information?')" type="submit" >Delete</button>
                    </form>
{{--                  @endcan--}}

                </td>

            </tr>
        @endforeach
    </table>
    {{$dues->links()}}
</div>
@endsection
