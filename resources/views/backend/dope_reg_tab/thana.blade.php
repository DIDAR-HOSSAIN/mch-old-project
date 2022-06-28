{{--<div class="form-group" >--}}
{{--    {{ Form::label("center_id", 'Center/মেডিকেল নির্বাচন করুন')}}--}}
{{--    {{Form::select('center_name', $centers, old('center_name') ? old('center_name') : (!empty($choiceslip) ? $choiceslip->center_name : null),--}}
{{--            ['class' => 'form-control','id' => 'center_id', 'placeholder' => 'Select Center']--}}
{{--    )}}--}}
{{--</div> <!-- end form-group -->--}}

<div class="form-group">
    {{ Form::label('thana_id',"Thana" ) }}
    {{ Form::select('thana',$pStations,
        old('thana') ? old('thana') : (!empty($dopereg) ? $dopereg->thana : null),
        ["class" => 'form-control',"id" => "thana_id","placeholder" => "Enter your Police Station"]) }}
</div> <!-- end form-group -->
