<div class="column is-3">
    <aside class="menu">
        <p class="menu-label">
            Manage Website
        </p>
        <ul class="menu-list">
            <li><a href="{{ route('admin.add_research') }}">Add research facilities</a></li>
            <li><a href="{{ route('admin.add_degree') }}">Add Degrees</a></li>
            <li><a href="{{ route('admin.add_staff') }}">Add staff</a></li>
            <li><a href="{{ route('admin.createDep') }}">Add department</a></li>
            <li><a href="{{ route('admin.add_course') }}">Add Course</a></li>
        </ul>
        <p class="menu-label">
            Dept details
        </p>
        <ul class="menu-list">
            @foreach($departments as $dep)
                <li><a href="{{route('admin.edit_dep',$dep->name)}}">{{ ucwords($dep->name) }}</a></li>
            @endforeach
        </ul>
    </aside>
</div>