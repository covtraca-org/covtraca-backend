<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Value:') !!}
    {!! Form::text('value', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', ['select' => 'Select', 'text' => 'Text', 'number' => 'Number', 'checkbox' => 'Checkbox', 'radio' => 'Radio', 'textarea' => 'Textarea', 'email' => 'Email', 'tel' => 'Tel', 'date' => 'Date', 'file' => 'File', 'toggle' => 'Toggle'], null, ['class' => 'form-control']) !!}
</div>

<!-- Options Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('options', 'Options:') !!}
    {!! Form::textarea('options', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('questions.index') }}" class="btn btn-default">Cancel</a>
</div>
