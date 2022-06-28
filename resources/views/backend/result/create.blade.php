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
                <h2 class="text-uppercase text-center" style="color:orange"> <strong> Result Entry  </strong> </h2>
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

                    {!! Form::open(array('url' => "results/$result->id",'method' => 'PUT', 'enctype' =>'multipart/form-data')) !!}

                @else
                    {!! Form::open(array('url' => "results",'method' => 'POST', 'enctype' =>'multipart/form-data')) !!}
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">

        <div class="form-group">
            {{Form::label("pid", "Patient ID")}}
            {{Form::select('pid',$doperegs,
                old('pid') ? old('pid') : (!empty($result) ? $result->pid : null),
                ["class" => 'form-control',"id" => "pid","readonly"]
            )}}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{Form::label("sid", "Sample ID")}}
            {{Form::select('sid',$samples,
                old('sid') ? old('sid') : (!empty($result) ? $result->sid : null),
                ["class" => 'form-control',"id" => "sid","readonly"]
            )}}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{Form::label("name", "Name")}}
            {{Form::text('name',
                old('name') ? old('name') : (!empty($result) ? $result->name : null),
                ["class" => 'form-control',"id" => "name","placeholder" => "Enter your Name","required"]
            )}}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{ Form::label('entry_date', "Entry Date" ) }}
            {{ Form::text('entry_date',
                old('entry_date') ? old('entry_date') : (!empty($result->entry_date) ? date('d-m-Y',strtotime($result->entry_date))  : date('d-m-Y', strtotime(\Carbon\Carbon::now(+6))) ),
                ["class" => 'form-control',"id" => "entry_date"]) }}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{ Form::label('date_of_test_result', "Date Of Test Result" ) }}
            {{ Form::text('date_of_test_result',
                old('date_of_test_result') ? old('date_of_test_result') : (!empty($result->date_of_test_result) ? date('d-m-Y',strtotime($result->date_of_test_result))  : date('d-m-Y', strtotime(\Carbon\Carbon::now(+6))) ),
                ["class" => 'form-control',"id" => "date_of_test_result"]) }}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{ Form::label('remarks',"Remarks" ) }}
            {{ Form::text('remarks',
                old('remarks') ? old('remarks') : (!empty($result) ? $result->remarks : null),
                ["class" => 'form-control',"id" => "remarks","placeholder" => "Enter Remarks"]) }}
        </div> <!-- end form-group -->
        </div>

            <div class="col-md-4">
            <div class="form-group">
                {{ Form::label("Amphetamine",'Amphetamine') }}
                <br/>
                {{ Form::label('Negative') }}
                {{Form::checkbox('Amphetamine', 'Negative')}}
                {{ Form::label('Positive') }}
                {{Form::checkbox('Amphetamine', 'Positive')}}
            </div> <!-- end form-group -->

            <div class="form-group">
                {{ Form::label("Benzodiazepines",'Benzodiazepines') }}
                <br/>
                {{ Form::label('Negative') }}
                {{Form::checkbox('Benzodiazepines', 'Negative')}}
                {{ Form::label('Positive') }}
                {{Form::checkbox('Benzodiazepines', 'Positive')}}
            </div> <!-- end form-group -->

            <div class="form-group">
                {{ Form::label("Opiates",'Opiates') }}
                <br/>
                {{ Form::label('Negative') }}
                {{Form::checkbox('Opiates', 'Negative')}}
                {{ Form::label('Positive') }}
                {{Form::checkbox('Opiates', 'Positive')}}
            </div> <!-- end form-group -->

            <div class="form-group">
                {{ Form::label("Cannabinoids",'Cannabinoids') }}
                <br/>
                {{ Form::label('Negative') }}
                {{Form::checkbox('Cannabinoids', 'Negative')}}
                {{ Form::label('Positive') }}
                {{Form::checkbox('Cannabinoids', 'Positive')}}
            </div> <!-- end form-group -->

            <div class="form-group">
                {{ Form::label("Alcohol",'Alcohol') }}
                <br/>
                {{ Form::label('Negative') }}
                {{Form::checkbox('Alcohol', 'Negative')}}
                {{ Form::label('Positive') }}
                {{Form::checkbox('Alcohol', 'Positive')}}
            </div> <!-- end form-group -->


            <div class="form-group">
                {{ Form::label("delivery_status",'Delivery Status') }}
                <br/>
                {{Form::checkbox('delivery_status','Yes',false)}}
                {{ Form::label('Yes') }}
                {{Form::checkbox('delivery_status','No',false)}}
                {{ Form::label('No') }}
            </div> <!-- end form-group -->
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
            var date_input=$('input[name="entry_date"]'); //our date input has the name "date"
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
