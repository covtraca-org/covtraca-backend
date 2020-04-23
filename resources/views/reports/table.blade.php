<div class="table-responsive">
    <table class="table" id="reports-table">
        <thead>
            <tr>
                <th>Answer</th>
        <th>Device Id</th>
        <th>Lat</th>
        <th>Long</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reports as $report)
            <tr>
                <td>{{ $report->answer }}</td>
            <td>{{ $report->device_id }}</td>
            <td>{{ $report->lat }}</td>
            <td>{{ $report->long }}</td>
                <td>
                    {!! Form::open(['route' => ['reports.destroy', $report->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('reports.show', [$report->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('reports.edit', [$report->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
