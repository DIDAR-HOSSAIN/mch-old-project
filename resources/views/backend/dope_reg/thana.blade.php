
<div class="form-group">
    {{ Form::label('thana_id',"Thana Name" ) }}
    {{ Form::select('thana_name',$pStations,
        old('thana_name') ? old('thana_name') : (!empty($dopereg) ? $dopereg->thana_name : null),
        ["class" => 'form-control',"id" => "thana_id","placeholder" => "Enter your Police Station"]) }}
</div> <!-- end form-group -->
