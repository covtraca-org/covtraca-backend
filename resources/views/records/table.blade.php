<div class="table-responsive">
    <table class="table" id="records-table">
        <thead>
            <tr>
                <th>Uid</th>
        <th>Long</th>
        <th>Lat</th>
        <th>Symptoms</th>
        <th>Tested</th>
        <th>Test Positive</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($records as $record)
            <tr>
                <td>{{ $record->uid }}</td>
            <td>{{ $record->long }}</td>
            <td>{{ $record->lat }}</td>
            <td>{{ $record->symptoms ? "Yes" : "No" }}</td>
            <td>{{ $record->tested ? "Yes" : "No" }}</td>
            <td>{{ $record->test_positive ? "Yes" : "No" }}</td>
                <td>
                    {!! Form::open(['route' => ['records.destroy', $record->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('records.show', [$record->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('records.edit', [$record->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
