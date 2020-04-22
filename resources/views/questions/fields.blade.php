<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', ['' => 'Choose a option', 'select' => 'Select', 'text' => 'Text', 'number' => 'Number', 'checkbox' => 'Checkbox', 'radio' => 'Radio', 'textarea' => 'Textarea', 'email' => 'Email', 'tel' => 'Tel', 'date' => 'Date', 'file' => 'File', 'toggle' => 'Toggle'], null, ['class' => 'form-control', 'id'=> 'type-select']) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">    
    {!! Form::text('value', null, ['hidden' => 'true', 'id'=> 'value']) !!}
</div>

<!-- Options Field -->
<div class="form-group col-sm-12 col-lg-12">
    <option-question name-field="options"></option-question>
    {!! Form::text('options', null, ['hidden' => 'true', 'id' => 'options']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('questions.index') }}" class="btn btn-default">Cancel</a>
</div>
