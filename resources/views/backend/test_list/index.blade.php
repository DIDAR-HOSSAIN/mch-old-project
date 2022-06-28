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
                    <a href="{{route('tests.create')}}" class="btn btn-info">Add New Test</a>
                </span>
                </div>
            </form>
        </div>

        <tr class="text-center bg-success">
            <th> S/N </th>
            <th> Test ID </th>
            <th> Entry Date </th>
            <th> Test Name </th>
            <th> Amount </th>
            <th> User Name </th>
            <th> Actions </th>

        </tr>
        {{--        @php $i=1;--}}
        {{--        @endphp--}}
        @foreach($tests as $key=> $test)
            <tr>
                {{--                <td>{{$i++}}</td>--}}
                <td>{{$tests->firstitem()+$key}}</td>
                <td>{{$test->dope_id}}</td>
                <td> {{\Carbon\Carbon::parse ($test->entry_date)->format('j F Y') }} </td>
                <td> {{$test->test_name}} </td>
                <td> {{$test->amount}} </td>
                <td> {{$test->user_name}} </td>
{{--                <td class="text-right"> {{$dope->dps_no}} </td>--}}
{{--                <td class="text-right"> {{$dope->fdr_amount}} </td>--}}


                <td>
                    {{--                    @can('customer_edit')--}}
                    <a href="{{URL::to('tests/'.$test->id.'/edit')}}" class="btn btn-sm btn btn-info">Edit</a>
{{--                    @endcan--}}
{{--                    <a href="{{route('dopereg.show/.$dopereg->id)}}" class="btn btn-sm btn btn-info">show</a>--}}

{{--                        @can('customer_show')--}}
                        <a href="{{URL::to('tests/'.$test->id)}}" class="btn btn-sm btn btn-success">Show</a>
{{--                        @endcan--}}

{{--                        @can('customer_delete')--}}
                        <form action="{{URL::to('tests/'.$test->id)}}" method="post" class="float-left">
                        @csrf
                        @method('Delete')
                     <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Delete Account Information?')" type="submit" >Delete</button>
                    </form>
{{--                  @endcan--}}

                </td>

            </tr>
        @endforeach
    </table>
    {{$tests->links()}}
</div>
@endsection
