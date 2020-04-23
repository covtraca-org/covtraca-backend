<div class="table-responsive">
    <table class="table" id="devices-table">
        <thead>
            <tr>
                <th>Uid</th>
        <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($devices as $device)
            <tr>
                <td>{{ $device->uid }}</td>
            <td>{{ $device->name }}</td>
                <td>
                    {!! Form::open(['route' => ['devices.destroy', $device->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('devices.show', [$device->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('devices.edit', [$device->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
