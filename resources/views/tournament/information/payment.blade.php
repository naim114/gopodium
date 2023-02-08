<div class="col">
    <p>Payment Record</p>
    <table class="table table-striped table-hover table-responsive">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Receipt</th>
                <th scope="col">Uploaded at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- TODO foreach here --}}
            <tr>
                {{-- <th scope="row">{{ $count++ }}</th> --}}
                <th scope="row">1</th>
                <td><a href="">View File</a></td>
                <td>10/10/10 10.00 a.m</td>
                <td>
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <button class="dropdown-item text-danger text-bold deleteButton">
                                Delete
                            </button>
                        </li>
                    </ul>
                </td>
            </tr>
            {{-- TODO foreach till here --}}
        </tbody>
    </table>
    <div class="d-flex flex-row-reverse">
        <button type="submit" class="btn btn-primary float-right addButton">
            Add Payment Record {{-- TODO w/ permission only --}}
        </button>
    </div>
</div>
