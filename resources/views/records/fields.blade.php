<!-- Uid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uid', 'Uid:') !!}
    {!! Form::select('uid', $userItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Symptoms Field -->
<div class="form-group col-sm-6">
    {!! Form::label('symptoms', 'Symptoms:') !!}
    {!! Form::select('symptoms', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control']) !!}
</div>

<!-- Tested Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tested', 'Tested:') !!}
    {!! Form::select('tested', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control']) !!}
</div>

<!-- Test Positive Field -->
<div class="form-group col-sm-6">
    {!! Form::label('test_positive', 'Test Positive:') !!}
    {!! Form::select('test_positive', ['0' => 'No', '1' => 'Yes'], null, ['class' => 'form-control']) !!}
</div>


<!-- Test Positive Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data', 'Data:') !!}
    {!! Form::textarea('data', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('records.index') }}" class="btn btn-default">Cancel</a>
</div>
