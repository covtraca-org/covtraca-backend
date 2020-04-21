<li class="{{ Request::is('questions*') ? 'active' : '' }}">
    <a href="{{ route('questions.index') }}"><i class="fa fa-edit"></i><span>Questions</span></a>
</li>

<li class="{{ Request::is('records*') ? 'active' : '' }}">
    <a href="{{ route('records.index') }}"><i class="fa fa-edit"></i><span>Records</span></a>
</li>

