@extends('layouts.admin-mainlayout')

@section('page-title', 'Medicine')
@section('page-pagination', 'Medicine')

@section('page-section')
    <section class="section">
        <div class="card">
            <div class="card-body">

                @if($medicines->isNotEmpty())
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-auto">
                            <h3 class="mb-0">Medicine</h3>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-journal-plus fs-4 me-2" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#medicineModal"></i>

                        </div>
                    </div>

                    <hr>
                    <table class="table table-striped" id="medicine">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($medicines as $medicine)
                                <tr>
                                    <td class="text-dark fw-bold">{{ $medicine->title }}</td>
                                    <td class="text-dark text-justify">
                                        {{ $medicine->description }}
                                        {{ \Illuminate\Support\Str::limit($medicine->description, 50) }}
                                    </td>
                                    <td class="text-dark">
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-outline-primary me-2" data-bs-toggle="modal"
                                                data-bs-target="#editMedicineModal{{ $medicine->id }}">
                                                Update
                                            </a>

                                            <form action="{{ route('admin.medicine-delete', $medicine->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this medicine?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
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
                        <h3>No List of Medicine</h3>
                        <p class="fst-italic text-primary" type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#medicineModal">Click here to add medicine</p>
                    </div>
                @endif
            </div>
        </div>
    </section>


    <!--Add Medicine Modal -->
    <div class="modal fade" id="medicineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Medicine
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('admin.medicine-add') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-12">
                                {{-- Medicine Name --}}
                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="text"
                                        class="form-control form-control-lg @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title') }}" placeholder="Medicine Name">
                                    <div class="form-control-icon">
                                        <i class="bi bi-capsule"></i>
                                    </div>
                                    @error('title')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- Description --}}
                                <div class="form-group position-relative has-icon-left mb-3">
                                    <textarea
                                        class="form-control form-control-lg @error('description') is-invalid @enderror"
                                        name="description" placeholder="Medicine Description"
                                        rows="5">{{ old('description') }}</textarea>
                                    <div class="form-control-icon">
                                        <i class="bi bi-card-text"></i>
                                    </div>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr class="m-0">
                        <div class="mt-3 text-end">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>

                            <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Submit</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Medicine Modal -->
    <div class="modal fade" id="editMedicineModal{{ $medicine->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle{{ $medicine->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle{{ $medicine->id }}">Edit Medicine</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>

                <form action="{{ route('admin.medicine-update', $medicine->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="text"
                                        class="form-control form-control-lg @error('update_title') is-invalid @enderror"
                                        name="update_title" value="{{ $medicine->title }}" placeholder="Medicine Name">
                                    <div class="form-control-icon">
                                        <i class="bi bi-capsule"></i>
                                    </div>
                                    @error('update_title')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group position-relative has-icon-left mb-3">
                                    <textarea
                                        class="form-control form-control-lg @error('update_description') is-invalid @enderror"
                                        name="update_description" placeholder="Medicine Description"
                                        rows="5">{{ $medicine->description }}</textarea>
                                    <div class="form-control-icon">
                                        <i class="bi bi-card-text"></i>
                                    </div>
                                    @error('update_description')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr class="m-0">
                        <div class="mt-3 text-end">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>

                            <button type="submit" class="btn btn-primary ms-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Update</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        new DataTable('#medicine');
    </script>
@endsection