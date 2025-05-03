@extends('layouts.admin-mainlayout')

@section('page-title', 'Pending Account/s')
@section('page-pagination', 'Accounts / Pending')

@section('page-section')
    <section class="section">
        <div class="card">
            <div class="card-body">

                @if($pendings->isNotEmpty())
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>School ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Type</th>
                                <th>Timestamp</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pendings as $pending)
                                <tr>
                                    <td class="col-2 fw-bold">{{ $pending->school_id }}</td>
                                    <td class="col-2"> {{ $pending->full_name }} </td>
                                    <td class="col-3"> {{ $pending->email }} </td>
                                    <td class="col-1"> {{ $pending->user_type->label() }} </td>
                                    <td class="col-2"> {{ $pending->created_at }} </td>
                                    <td class="col-2">
                                       <div class="d-flex">
                                        <form action="{{ route('admin.admin-approve', $pending->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-primary me-2">
                                                Approve
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.admin-decline', $pending->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to decline this account?');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Decline
                                            </button>
                                        </form>
                                       </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center mt-3">
                        <h3>No Pending Accounts</h3>
                        <p class="fst-italic">There are no accounts to approve.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>


    <script>
        new DataTable('#accounts');
    </script>
@endsection
