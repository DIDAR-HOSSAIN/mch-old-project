@extends('backend.layouts.master')

@section('style')

    <!--formden.js communicates with FormDen server to validate fields and submit via AJAX -->
    <script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

    <!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <!--Font Awesome (added because you use icons in your prepend/append)-->
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

    <!-- Inline CSS based on choices in "Settings" tab -->
    <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2 class="text-uppercase text-center" style="color:orange"> <strong> Add Sample Information  </strong> </h2>
            </div>
            <hr>
            <div class="body">

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    </div>
                @endif

                @if(session('message'))
                    <div class="alert alert-success"> {{session('message')}}  </div>
                @endif

                @if($formType == 'edit')

                    {!! Form::open(array('url' => "samples/$sample->id",'method' => 'PUT', 'enctype' =>'multipart/form-data')) !!}

                @else
                    {!! Form::open(array('url' => "samples",'method' => 'POST', 'enctype' =>'multipart/form-data')) !!}
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">

        <div class="form-group">
            {{Form::label("pid", "PID")}}
            {{Form::select('pid',$doperegs,
                old('pid') ? old('pid') : (!empty($sample) ? $sample->pid : null),
                ["class" => 'form-control',"id" => "pid"]
            )}}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{Form::label("name", "Name")}}
            {{Form::text('name',
                old('name') ? old('name') : (!empty($sample) ? $sample->name : null),
                ["class" => 'form-control',"id" => "name","placeholder" => "Enter your Name","required"]
            )}}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{ Form::label('sample_collected_by',"Sample Collected By" ) }}
            {{ Form::select('sample_collected_by',['Rubel' => 'Rubel', 'Hasan' => 'Hasan','Simanta' => 'Simanta', 'Osman' => 'Osman'],
                old('sample_collected_by') ? old('sample_collected_by') : (!empty($sample) ? $sample->sample_collected_by : null),
                ["class" => 'form-control',"id" => "sample_collected_by","placeholder" => "Select Sample Collected By"]) }}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{ Form::label('sample_collection_date', "Sample Collection Date" ) }}
            {{ Form::text('sample_collection_date',
                old('sample_collection_date') ? old('sample_collection_date') : (!empty($sample->sample_collection_date) ? date('d-m-Y',strtotime($sample->sample_collection_date))  : date('d-m-Y', strtotime(\Carbon\Carbon::now(+6))) ),
                ["class" => 'form-control',"id" => "sample_collection_date"]) }}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{ Form::label('remarks',"Remarks" ) }}
            {{ Form::text('remarks',
                old('remarks') ? old('remarks') : (!empty($sample) ? $sample->remarks : null),
                ["class" => 'form-control',"id" => "remarks","placeholder" => "Enter Remarks"]) }}
        </div> <!-- end form-group -->
        </div>

            <div class="col-md-4">
            <div class="form-group">
                {{ Form::label("symptoms",'Symptoms') }}
                <br/>
                {{ Form::label('Cough') }}
                {{Form::checkbox('symptom[]', 'Cough')}}
                {{ Form::label('No Symptom') }}
                {{Form::checkbox('symptom[]', 'No Symptoms')}}
                {{ Form::label('Shortness of Breath') }}
                {{Form::checkbox('symptom[]', 'Shortness of Breath')}}
                <br/>
                {{ Form::label('Fever') }}
                {{Form::checkbox('symptom[]', 'Fever',false)}}
                {{ Form::label('Others') }}
                {{Form::checkbox('symptom[]', 'Others',false)}}
                {{ Form::label('Sore throat') }}
                {{Form::checkbox('symptom[]', 'Sore throat',false)}}
            </div> <!-- end form-group -->

                <div class="form-group">
                {{ Form::label("sample_classification",'Sample Classification') }}
                <br/>
                {{ Form::label('Contact') }}
                {{Form::checkbox('sample_classification[]', 'Contact')}}
                {{ Form::label('Dead Body') }}
                {{Form::checkbox('sample_classification[]', 'Dead Body')}}
                {{ Form::label('First time OR New') }}
                {{Form::checkbox('sample_classification[]', 'First time OR New')}}
                <br/>
                {{ Form::label('Follow up') }}
                {{Form::checkbox('sample_classification[]', 'Follow up',false)}}
                </div> <!-- end form-group -->

                <div class="form-group">
                    <label><strong>Specimen Details :</strong></label><br>
                    <label><input type="checkbox" name="specimen_details[]" value="Urine"> Urine </label>
                    <label><input type="checkbox" name="specimen_details[]" value="Nasal Swab"> Nasal Swab </label>
                    <label><input type="checkbox" name="specimen_details[]" value="Serum"> Serum </label>
                    <label><input type="checkbox" name="specimen_details[]" value="Throat Swab"> Throat Swab </label>
                </div>

            {{--<div class="form-group">--}}
                {{--{{ Form::label("specimen_details",'Specimen Details') }}--}}
                {{--<br/>--}}
                {{--{{Form::checkbox('specimen_details[]','Urine')}}--}}
                {{--{{ Form::label('Urine') }}--}}
                {{--{{Form::checkbox('specimen_details[]','Nasal Swab')}}--}}
                {{--{{ Form::label('Nasal Swab') }}--}}
                {{--{{Form::checkbox('specimen_details[]','Serum',false)}}--}}
                {{--{{ Form::label('Serum') }}--}}
                {{--<br/>--}}
                {{--{{Form::checkbox('specimen_details[]','Throat Swab',false)}}--}}
                {{--{{ Form::label('Throat Swab') }}--}}
            {{--</div> <!-- end form-group -->--}}

            </div>

                </div> <!-- end row -->
                    </div>
                        </div> <!-- end row -->

                        {{Form::submit('Submit', ['class'=>"btn btn-success"])}}
                        {!! Form::close() !!}

                            </div><!-- end body -->
                        </div> <!-- card -->
                    </div> <!-- end col-md-12 -->
    </div>

@endsection


@section('script')

    <!-- Extra JavaScript/CSS added manually in "Settings" tab -->
    <!-- Include jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script>
        $(document).ready(function(){
            var date_input=$('input[name="dob"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'dd-mm-yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
        })
    </script>
@endsection
