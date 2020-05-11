<!-- Country Code Field -->
<div class="form-group">
    {!! Form::label('country_code', 'Country Code:') !!}
    <p>{{ $countReport->country_code }}</p>
</div>

<!-- Count Field -->
<div class="form-group">
    {!! Form::label('count', 'Count:') !!}
    <p>{{ $countReport->count }}</p>
</div>

<!-- Country Name Field -->
<div class="form-group">
    {!! Form::label('country_name', 'Country Name:') !!}
    <p>{{ $countReport->country_name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $countReport->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $countReport->updated_at }}</p>
</div>

