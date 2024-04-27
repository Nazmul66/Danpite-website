@extends('backend.layout.template')

@push('title')
        <title>Dashboard - Service Page</title>
@endpush

@section('body-content')

    <div class="card">
        <div class="card-title">
            <h5>Manage Service Section</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add">Add Service</button>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                @if ( $all_services->count() === 0 )
                    <div class="alert alert-danger" role="alert">This is no data here</div>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#SL.</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Icon Code</th>
                                <th>Percentage</th>
                                <th>Color Code</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($all_services as $row => $all_service)
                            <tr>
                                <td>{{ $row + 1 }}</td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $all_service->service_title }}</strong>
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $all_service->service_slug }}</strong>
                                </td>
                                <td>
                                    <img src="{{ asset($all_service->service_img) }}" alt="Avatar" class="rounded-circle" style="width: 75px;">
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $all_service->service_desc }}</strong>
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i><span class="badge bg-label-secondary">{{ $all_service->service_icon }}</span>
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i><span class="badge bg-label-warning">{{ $all_service->service_percent }}%</span>
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i><span class="badge bg-label-primary">{{ $all_service->service_color }}</span>
                                </td>
                                <td>
                                    @if ( $all_service->status === 1 )
                                       <span class="badge bg-label-primary me-1">Active</span>
                                    @else
                                       <span class="badge bg-label-danger me-1">InActive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="action_btn text-primary cursor-pointer" data-bs-toggle="modal" data-bs-target="#edit{{ $all_service->id }}"><i class="bx bx-edit-alt me-1"></i></span>
                                        <a class="action_btn ms-2 text-danger" href="{{ route('service.delete', $all_service->id ) }}"><i class="bx bx-trash me-1"></i></a>
                                    </div>
                                </td>
                            </tr>

                                {{-- Modal for edit --}}
                                <div class="modal fade" id="edit{{ $all_service->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel3">Update Service Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('service.update', $all_service->id) }}" enctype="multipart/form-data">

                                                @csrf

                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="service_title" class="form-label">Service Title</label>
                                                        <input type="text" id="service_title" class="form-control" value="{{ $all_service->service_title }}" name="service_title" placeholder="Enter here.....">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="service_img" class="form-label">Service Image</label>
                                                        <input class="form-control" type="file" name="service_img" id="service_img">
                                                        <img src="{{ asset($all_service->service_img) }}" alt="Avatar" style="width: 110px;">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="service_desc" class="form-label">Service Description</label>
                                                        <textarea class="form-control" id="service_desc" name="service_desc" rows="3">{{ $all_service->service_desc }}</textarea>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="service_icon" class="form-label">Service Icon</label>
                                                        <input type="text" id="service_icon" class="form-control" value="{{ $all_service->service_icon }}" name="service_icon" placeholder="Enter here.....">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="service_percent" class="form-label">Service Percentage</label>
                                                        <input type="number" id="service_percent" class="form-control" value="{{ $all_service->service_percent }}" name="service_percent" placeholder="Enter here.....">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="service_color" class="form-label">Service Color Code</label>
                                                        <input class="form-control" type="color" name="service_color" value="{{ $all_service->service_color }}" id="service_color">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select class="form-select" id="status" aria-label="Default select example" name="status">
                                                        <option selected="" disabled="">Select the status menu</option>
                                                        <option value="1" @if( $all_service->status === 1 ) selected @endif>Active</option>
                                                        <option value="2" @if( $all_service->status === 2 ) selected @endif>InActive</option>
                                                        </select>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <span class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                        Close
                                                        </span>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        {{-- Modal for add --}}
        <div class="modal fade" id="Add" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel3">Add Service Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('service.store') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="col mb-3">
                                <label for="service_title" class="form-label">Service Title</label>
                                <input type="text" id="service_title" class="form-control" name="service_title" placeholder="Enter here.....">
                            </div>

                            <div class="mb-3">
                                <label for="service_img" class="form-label">Service Image</label>
                                <input class="form-control" type="file" name="service_img" id="service_img">
                            </div>

                            <div class="mb-3">
                                <label for="service_desc" class="form-label">Service Description</label>
                                <textarea class="form-control" id="service_desc" name="service_desc" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="service_icon" class="form-label">Service Icon</label>
                                <input type="text" id="service_icon" class="form-control" name="service_icon" placeholder="Enter here.....">
                            </div>

                            <div class="mb-3">
                                <label for="service_percent" class="form-label">Service Percentage</label>
                                <input type="number" id="service_percent" class="form-control" name="service_percent" placeholder="Enter here.....">
                            </div>

                            <div class="mb-3">
                                <label for="service_color" class="form-label">Service Color Code</label>
                                <input class="form-control" type="color" name="service_color" value="#ff0000" id="service_color">
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" aria-label="Default select example" name="status">
                                  <option selected="" disabled="">Select the status menu</option>
                                  <option value="1">Active</option>
                                  <option value="2">InActive</option>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <span class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </span>
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
        </div>

    </div>

@endsection

