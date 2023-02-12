@extends('layouts.dashboard-master')

@section('page-title', trans('app.plan'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('plan') }}">{{ trans('app.plan') }}</a> /
    <a>Manage</a>
@stop

@section('content')
    <div class="container">
        <button class="btn btn-primary mb-2 addButton">
            + Add Plan
        </button>
        <table class="table table-striped table-hover table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Plan</th>
                    <th scope="col">Price (RM)</th>
                    <th scope="col">Duration (Day)</th>
                    <th scope="col">Create at</th>
                    <th scope="col">Update at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plans as $plan)
                    <tr>
                        <th scope="row">{{ $count++ }}</th>
                        <td>{{ $plan->name }}</td>
                        <td>{{ number_format($plan->price / 100, 2, '.', ' ') }}</td>
                        <td>{{ $plan->duration }}</td>
                        <td>{{ $plan->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>{{ $plan->updated_at->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <button data-item="{{ $plan }}" class="dropdown-item editButton">
                                        Edit
                                    </button>
                                </li>
                                <li>
                                    <button data-item="{{ $plan }}" class="dropdown-item text-danger deleteButton">
                                        Delete
                                    </button>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Add Modal --}}
    @include('plan.add')

    {{-- Edit Modal --}}
    @include('plan.edit')

    {{-- Delete Modal --}}
    @include('plan.delete')
@stop

@section('scripts')
    <script>
        // add modal
        $(".addButton").click(function() {
            $('#addModal').modal('show');
        });

        $(".closeAddModal").click(function() {
            $('#addModal').modal('hide');
        });

        // edit modal
        $(".editButton").click(function() {
            $('#editModal').modal('show');
            var plan = $(this).data('item');
            $('#name').val(plan.name);
            $('#id').val(plan.id);
            $('#price').val((plan.price / 100).toFixed(2));
            $('#team_limit').val(plan.team_limit);
            $('#athlete_limit').val(plan.athlete_limit);
            $('#event_limit').val(plan.event_limit);
            $('#duration').val(plan.duration);
            $("#invite").prop("checked", plan.invite);
            $("#personalization").prop("checked", plan.personalization);
        });

        $(".closeEditModal").click(function() {
            $('#editModal').modal('hide');
        });

        // delete modal
        $(".deleteButton").click(function() {
            $("#submit").prop("disabled", true);
            $('#deleteModal').modal('show');

            var plan = $(this).data('item');
            $('#del_id').val(plan.id);
            $('#del_name').val(plan.name);

            $('#del_text').val(null);

            $('#warning').text(`
                WARNING:
                Are you sure you want to delete ${plan.name}? Previous data can't be retrieve back.
                Type the plan name and click Confirm Delete to confirm plan deletion.
            `);
        });

        $("#del_text").change(function() {
            $("#submit").prop("disabled", !($('#del_text').val() == $('#del_name').val()));
        });

        $(".closeDeleteModal").click(function() {
            $("#submit").prop("disabled", true);
            $('#deleteModal').modal('hide');
        });
    </script>
@stop
