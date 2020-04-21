<!-- Uid Field -->
<div class="form-group">
    {!! Form::label('uid', 'Uid:') !!}
    <p>{{ $record->uid }}</p>
</div>

<!-- Long Field -->
<div class="form-group">
    {!! Form::label('long', 'Long:') !!}
    <p>{{ $record->long }}</p>
</div>

<!-- Lat Field -->
<div class="form-group">
    {!! Form::label('lat', 'Lat:') !!}
    <p>{{ $record->lat }}</p>
</div>

<!-- Symptoms Field -->
<div class="form-group">
    {!! Form::label('symptoms', 'Symptoms:') !!}
    <p>{{ $record->symptoms ? "Yes" : "No" }}</p>
</div>

<!-- Tested Field -->
<div class="form-group">
    {!! Form::label('tested', 'Tested:') !!}
    <p>{{ $record->tested ? "Yes" : "No" }}</p>
</div>

<!-- Test Positive Field -->
<div class="form-group">
    {!! Form::label('test_positive', 'Test Positive:') !!}
    <p>{{ $record->test_positive ? "Yes" : "No" }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $record->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $record->updated_at }}</p>
</div>

