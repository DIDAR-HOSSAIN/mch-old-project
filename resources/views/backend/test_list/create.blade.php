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
                <h2 class="text-uppercase text-center" style="color:orange"> <strong> Add Patient Information  </strong> </h2>
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
                            {!! Form::open(array('url' => "tests/$test->id",'method' => 'PUT', 'enctype' =>'multipart/form-data')) !!}
                    @else
                        {!! Form::open(array('url' => "tests",'method' => 'POST', 'enctype' =>'multipart/form-data')) !!}
                    @endif



                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">

        <div class="form-group">
            {{Form::label("dope_id", "Dope ID")}}
            {{Form::text('dope_id',
                old('dope_id') ? old('dope_id') : (!empty($test) ? $test->dope_id : null),
                ["class" => 'form-control',"id" => "dope_id",]
            )}}
        </div> <!-- end form-group -->

         <div class="form-group">
        {{ Form::label('entry_date', "Entry Date" ) }}
        {{ Form::text('entry_date',
            old('entry_date') ? old('entry_date') : (!empty($test->entry_date) ? date('d-m-Y', strtotime($test->entry_date)) : date('d-m-Y', strtotime(\Carbon\Carbon::now(+6))) ),
            ["class" => 'form-control',"id" => "entry_date", "required"]) }}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{Form::label("test_name", "Test Name")}}
            {{Form::text('test_name',
                old('test_name') ? old('test_name') : (!empty($test) ? $test->test_name : null),
                ["class" => 'form-control',"id" => "test_name","placeholder" => "Enter Test Name","required"]
            )}}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{Form::label("amount", "Amount")}}
            {{Form::text('amount',
                old('amount') ? old('amount') : (!empty($test) ? $test->amount : null),
                ["class" => 'form-control',"id" => "amount","placeholder" => "Enter your Name","required"]
            )}}
        </div> <!-- end form-group -->


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


    <!-- Extra JavaScript/CSS added manually in "Settings" tab -->
    <!-- Include jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>



    <!-- Javascript -->
    <script src="{{asset('Lib/js/jquery-min.js')}}"></script>
    <script src="{{asset('Lib/js/libscripts.bundle.js')}}"></script>
    <script src="{{asset('Lib/js/vendorscripts.bundle.js')}}"></script>
    <script src="{{asset('Lib/js/flotscripts.bundle.js')}}"></script>
    <script src="{{asset('Lib/js/c3.bundle.js')}}"></script>
    <script src="{{asset('Lib/js/knob.bundle.js')}}"></script>
    <script src="{{asset('Lib/js/mainscripts.bundle.js')}}"></script>
    <script src="{{asset('Lib/js/index11.js')}}"></script>


<script>
    $(document).ready(function(){
        var date_input=$('input[name="reg_date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'dd-mm-yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
