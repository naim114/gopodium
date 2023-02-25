<button class="btn btn-primary mb-2 addIndividualButton">
    + Add Athlete
</button>

<table class="table table-striped table-hover table-responsive">
    <thead class="thead-dark">
        <tr class="align-middle">
            <th scope="col">#</th>
            <th scope="col">Athlete</th>
            <th scope="col">Team</th>
            <th scope="col">Score</th>
            <th scope="col">Notes</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        {{-- TODO foreach here --}}
        <tr class="align-middle">
            {{-- <th scope="row">{{ $count++ }}</th> --}}
            <th scope="row">1</th>
            <td>ATHLETE</td>
            <td>TEAM</td>
            <td>1.00</td>
            <td>Q</td>
            <td>
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <button class="dropdown-item editIndividualButton">
                            Manage
                        </button>
                    </li>
                    <li>
                        <button class="dropdown-item text-danger deleteIndividualButton">
                            Remove Record
                        </button>
                    </li>
                </ul>
            </td>
        </tr>
        {{-- TODO foreach till here --}}
    </tbody>
</table>
