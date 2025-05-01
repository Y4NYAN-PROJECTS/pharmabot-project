@extends('layouts.admin-mainlayout')

@section('page-title', 'Student Account List')
@section('page-pagination', 'Student Account')

@section('page-section')
    <section class="section">
        <div class="card">
            <div class="card-body">

                @if($students->isNotEmpty())
                    <table class="table table-striped" id="accounts">
                        <thead>
                            <tr>
                                <th>School ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td class="text-dark fw-bold">{{ $student->school_id }}</td>
                                    <td class="text-dark"> {{ $student->full_name }} </td>
                                    <td class="text-dark"> {{ $student->email }} </td>
                                    <td class="text-dark">
                                        <div class="d-flex">

                                            <form action="{{ route('admin.student-approve', $student->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-outline-primary me-2">
                                                    Approve
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.student-delete', $student->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this account?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
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
                        <h3>No Student List</h3>
                        <p class="fst-italic" type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#medicineModal">No students account to display</p>
                    </div>
                @endif
            </div>
        </div>
    </section>


    <script>
        new DataTable('#accounts');
    </script>
@endsection