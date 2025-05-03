@extends('layouts.admin-mainlayout')

@section('page-title', 'Administrator Account/s')
@section('page-pagination', 'Accounts / Admin')

@section('page-section')
    <section class="section">
        <div class="card">
            <div class="card-body">

                @if($admins->isNotEmpty())
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>School ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Approved At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td class="col-2 fw-bold">{{ $admin->school_id }}</td>
                                    <td class="col-2"> {{ $admin->full_name }} </td>
                                    <td class="col-4"> {{ $admin->email }} </td>
                                    <td class="col-2"> {{ $admin->approved_at }} </td>
                                    <td class="col-2">
                                       <div class="d-flex">
                                            <form action="{{ route('admin.admin-delete', $admin->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this account?');">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                            <button class="btn btn-sm btn-secondary on-going ms-1">More Details</button>
                                       </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center mt-3">
                        <h3>No Admin Account/s</h3>
                        <p class="fst-italic">There are no records of admin account/s.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>


    <script>
        new DataTable('#accounts');
    </script>
@endsection
