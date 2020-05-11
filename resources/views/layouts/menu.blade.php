<li class="{{ Request::is('questions*') ? 'active' : '' }}">
    <a href="{{ route('questions.index') }}"><i class="fa fa-edit"></i><span>Questions</span></a>
</li>


<li class="{{ Request::is('devices*') ? 'active' : '' }}">
    <a href="{{ route('devices.index') }}"><i class="fa fa-edit"></i><span>Devices</span></a>
</li>


<li class="{{ Request::is('reports*') ? 'active' : '' }}">
    <a href="{{ route('reports.index') }}"><i class="fa fa-edit"></i><span>Reports</span></a>
</li>

<li class="{{ Request::is('countReports*') ? 'active' : '' }}">
    <a href="{{ route('countReports.index') }}"><i class="fa fa-edit"></i><span>Count Reports</span></a>
</li>

