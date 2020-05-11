<div class="table-responsive">
    <table class="table" id="countReports-table">
        <thead>
            <tr>
                <th>Country Code</th>
        <th>Count</th>
        <th>Country Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($countReports as $countReport)
            <tr>
                <td>{{ $countReport->country_code }}</td>
            <td>{{ $countReport->count }}</td>
            <td>{{ $countReport->country_name }}</td>
                <td>
                    {!! Form::open(['route' => ['countReports.destroy', $countReport->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('countReports.show', [$countReport->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('countReports.edit', [$countReport->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
