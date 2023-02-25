<div class="d-flex justify-content-between align-items-center">
    <h5>Team Managers</h5>
    <button class="btn btn-primary mb-2 inviteButton">
        + Invite Managers
    </button>
</div>
<table class="table table-striped table-hover table-responsive">
    <thead class="thead-dark">
        <tr class="align-middle">
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Username</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        {{-- TODO foreach here --}}
        <tr class="align-middle">
            {{-- <th scope="row">{{ $count++ }}</th> --}}
            <th scope="row">1</th>
            <td>FULL NAME</td>
            <td>fullname</td>
            <td>
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <button class="dropdown-item text-danger uninviteButton">
                            Uninvite
                        </button>
                    </li>
                </ul>
            </td>
        </tr>
        {{-- TODO foreach till here --}}
    </tbody>
</table>
