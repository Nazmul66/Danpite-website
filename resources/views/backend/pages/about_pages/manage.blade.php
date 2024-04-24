@extends('backend.layout.template')

@push('css')
    <link rel="stylesheet" href="style.css">
@endpush

@section('body-content')

    <div class="card">
        <div class="card-title">
            <h5>Manage About Section</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add">Add</button>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Project</th>
                        <th>Client</th>
                        <th>Users</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr >
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong>
                        </td>
                        <td>Albert Cook</td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="Lilian Fuller">
                                <img src="{{ asset('backend/assets/img/avatars/5.png') }}" alt="Avatar" class="rounded-circle">
                            </li>
                            </ul>
                        </td>
                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="action_btn text-primary cursor-pointer" data-bs-toggle="modal" data-bs-target="#edit"><i class="bx bx-edit-alt me-1"></i></span>
                                <a class="action_btn ms-2 text-danger" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>

        {{-- Modal for add --}}
        <div class="modal fade" id="Add" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel3">Add title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nameLarge" class="form-label">Name</label>
                      <input type="text" id="nameLarge" class="form-control" placeholder="Enter Name">
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col mb-0">
                      <label for="emailLarge" class="form-label">Email</label>
                      <input type="text" id="emailLarge" class="form-control" placeholder="xxxx@xxx.xx">
                    </div>
                    <div class="col mb-0">
                      <label for="dobLarge" class="form-label">DOB</label>
                      <input type="text" id="dobLarge" class="form-control" placeholder="DD / MM / YY">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <button type="button" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </div>
        </div>


        {{-- Modal for edit --}}
        <div class="modal fade" id="edit" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Edit title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <div class="col mb-3">
                        <label for="nameLarge" class="form-label">Name</label>
                        <input type="text" id="nameLarge" class="form-control" placeholder="Enter Name">
                    </div>
                    </div>
                    <div class="row g-2">
                    <div class="col mb-0">
                        <label for="emailLarge" class="form-label">Email</label>
                        <input type="text" id="emailLarge" class="form-control" placeholder="xxxx@xxx.xx">
                    </div>
                    <div class="col mb-0">
                        <label for="dobLarge" class="form-label">DOB</label>
                        <input type="text" id="dobLarge" class="form-control" placeholder="DD / MM / YY">
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                    </button>
                    <button type="button" class="btn btn-primary">Update</button>
                </div>
                </div>
            </div>
        </div>

    </div>

@endsection
