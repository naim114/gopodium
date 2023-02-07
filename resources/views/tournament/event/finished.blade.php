<table id="permissionsTable" class="table table-striped table-hover table-responsive">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Code</th>
            <th scope="col">Category</th>
            <th scope="col">Round</th>
            <th scope="col">Type</th>
            <th scope="col">Date & Time</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        {{-- TODO foreach here --}}
        <tr>
            {{-- <th scope="row">{{ $count++ }}</th> --}}
            <th scope="row">1</th>
            <td>EVENT NAME</td>
            <td>EVE001</td>
            <td>L</td>
            <td>Final</td>
            <td>Athlete vs Athlete</td>
            <td>2/3/2023 3 a.m.</td>
            <td>
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a href="{{ route('tournament.event.manage') }}" class="dropdown-item">
                            Manage
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tournament.event.settings') }}" class="dropdown-item">
                            Settings
                        </a>
                    </li>
                    <li>
                        <button class="dropdown-item text-danger deleteButton">
                            Delete
                        </button>
                    </li>
                </ul>
            </td>
        </tr>
        {{-- TODO foreach till here --}}
    </tbody>
</table>
