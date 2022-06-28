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
                <h2 class="text-uppercase text-center" style="color:orange"> <strong> Due Collect  </strong> </h2>
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

                    {!! Form::open(array('url' => "dues/$due->id",'method' => 'PUT', 'enctype' =>'multipart/form-data')) !!}

                @else
                    {!! Form::open(array('url' => "dues",'method' => 'POST', 'enctype' =>'multipart/form-data')) !!}
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">

        <div class="form-group">
            {{Form::label("pid", "Patient ID")}}
            {{Form::select('pid',$doperegs,
                old('pid') ? old('pid') : (!empty($due) ? $due->pid : null),
                ["class" => 'form-control',"id" => "pid","readonly"]
            )}}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{Form::label("name", "Name")}}
            {{Form::text('name',
                old('name') ? old('name') : (!empty($due) ? $due->name : null),
                ["class" => 'form-control',"id" => "name","placeholder" => "Enter your Name","required"]
            )}}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{ Form::label('entry_date', "Entry Date" ) }}
            {{ Form::text('entry_date',
                old('entry_date') ? old('entry_date') : (!empty($due->entry_date) ? date('d-m-Y',strtotime($due->entry_date))  : date('d-m-Y', strtotime(\Carbon\Carbon::now(+6))) ),
                ["class" => 'form-control',"id" => "entry_date","readonly"]) }}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{ Form::label('collection_date', "Collection Date" ) }}
            {{ Form::text('collection_date',
                old('collection_date') ? old('collection_date') : (!empty($due->collection_date) ? date('d-m-Y',strtotime($due->entry_date))  : date('d-m-Y', strtotime(\Carbon\Carbon::now(+6))) ),
                ["class" => 'form-control',"id" => "collection_date"]) }}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{Form::label("due_amount", "Due Amount")}}
            {{Form::text('due_amount',
                old('due_amount') ? old('due_amount') : (!empty($due) ? $due->due_amount : null),
                ["class" => 'form-control',"id" => "due_amount","readonly"]
            )}}
        </div> <!-- end form-group -->

        <div class="form-group">
            {{Form::label("collection_amount", "Collection Amount")}}
            {{Form::text('collection_amount',
                old('collection_amount') ? old('collection_amount') : (!empty($due) ? $due->collection_amount : null),
                ["class" => 'form-control',"id" => "collection_amount"]
            )}}
        </div> <!-- end form-group -->


            <div class="form-group">
                {{ Form::label('remarks',"Remarks" ) }}
                {{ Form::text('remarks',
                    old('remarks') ? old('remarks') : (!empty($due) ? $due->remarks : null),
                    ["class" => 'form-control',"id" => "remarks","placeholder" => "Enter Remarks"]) }}
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
