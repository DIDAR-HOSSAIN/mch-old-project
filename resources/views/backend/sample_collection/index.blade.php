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
                    <a href="{{route('samples.create')}}" class="btn btn-info">Add New Sample</a>
                </span>
                </div>
            </form>
        </div>

        <tr class="text-center bg-success">
            <th> S/N </th>
            <th> Patient ID </th>
            <th> Sample ID </th>
            <th> Patient Name </th>
            <th> Sample Collected By </th>
            <th> Symptoms </th>
            <th> Sample Classification </th>
            <th> Specimen Details </th>
            <th> Sample Collection Date</th>
            <th> Remarks </th>
            <th> User Name </th>
            <th> Actions </th>

        </tr>
        {{--        @php $i=1;--}}
        {{--        @endphp--}}
        @foreach($samples as $key=> $sample)
            <tr>
                {{--                <td>{{$i++}}</td>--}}
                <td>{{$samples->firstitem()+$key}}</td>
                <td>MCHD-{{$sample->sample_collection_date}}-{{$sample->id}}</td>
{{--                <td>{{$sample->id}}{{$sample->pid}}{{$sample->pid}}{{$sample->pid}}</td>--}}
                <td>{{$sample->pid}}</td>
                <td> {{$sample->name}} </td>
                <td> {{$sample->sample_collected_by}} </td>
                <td>
                    @php $symptoms = $sample->symptom ? json_decode($sample->symptom, true) : []; @endphp
                    @foreach($symptoms as $symptom)
                        {{$symptom}},
                    @endforeach
                </td>
                <td>
                    @php $sample_classifications = $sample->sample_classification ? json_decode($sample->sample_classification, true) : []; @endphp
                    @foreach($sample_classifications as $sample_classification)
                        {{$sample_classification}},
                    @endforeach
                </td>
                <td>
                    @php $specimen_dts = $sample->specimen_details ? json_decode($sample->specimen_details, true) : []; @endphp
                    @foreach($specimen_dts as $specimen_details)
                        {{$specimen_details}},
                    @endforeach
                </td>
                <td> {{\Carbon\Carbon::parse ($sample->sample_collection_date)->format('j F, Y') }} </td>
                <td> {{$sample->remarks}} </td>
                <td> {{$sample->user_name}} </td>
{{--                <td class="text-right"> {{$dope->dps_no}} </td>--}}
{{--                <td class="text-right"> {{$dope->fdr_amount}} </td>--}}


                <td>
{{--                    @can('customer_edit')--}}
                    <a href="{{URL::to('samples/'.$sample->id.'/edit')}}" class="btn btn-sm btn btn-info">Edit</a>
{{--                    @endcan--}}
{{--                    <a href="{{route('dopereg.show/.$dopereg->id)}}" class="btn btn-sm btn btn-info">show</a>--}}

{{--                        @can('customer_show')--}}
                        <a href="{{URL::to('samples/'.$sample->id)}}" class="btn btn-sm btn btn-success">Show</a>
{{--                        @endcan--}}

{{--                        @can('customer_delete')--}}
                        <form action="{{URL::to('samples/'.$sample->id)}}" method="post" class="float-left">
                        @csrf
                        @method('Delete')
                     <button class="btn btn-sm btn btn-danger"onclick="return confirm('Are you sure Delete Account Information?')" type="submit" >Delete</button>
                    </form>
{{--                  @endcan--}}

                </td>

            </tr>
        @endforeach
    </table>
    {{$samples->links()}}
</div>
@endsection
