@extends('backend.layout.template')

@push('title')
        <title>Dashboard - Testimonial Page</title>
@endpush

@section('body-content')

    <div class="card">
        <div class="card-title">
            <h5>Manage Testimonial Section</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add">Add Testimonial</button>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                @if ( $all_testimonials->count() === 0 )
                   <div class="alert alert-danger" role="alert">This is no data here</div>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#SL.</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Business Type</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($all_testimonials as $row => $all_testimonial)
                            <tr>
                                <td>{{ $row + 1 }}</td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $all_testimonial->test_title }}</strong>
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $all_testimonial->test_desc }}</strong>
                                </td>
                                <td>
                                    <img src="{{ asset($all_testimonial->test_img) }}" alt="Avatar" class="rounded-circle" style="width: 75px;">
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i><span class="badge bg-primary">{{ $all_testimonial->business_type }}</span>
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i><span class="badge bg-info">{{ $all_testimonial->test_link }}</span>
                                </td>
                                <td>
                                    @if ( $all_testimonial->status === 1 )
                                       <span class="badge bg-label-primary me-1">Active</span>
                                    @else
                                       <span class="badge bg-label-danger me-1">InActive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="action_btn text-primary cursor-pointer" data-bs-toggle="modal" data-bs-target="#edit{{ $all_testimonial->id }}"><i class="bx bx-edit-alt me-1"></i></span>
                                        <a class="action_btn ms-2 text-danger" href="{{ route('testimonial.delete', $all_testimonial->id ) }}"><i class="bx bx-trash me-1"></i></a>
                                    </div>
                                </td>
                            </tr>

                                {{-- Modal for edit --}}
                                <div class="modal fade" id="edit{{ $all_testimonial->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                     <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel3">Update Service Data</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form method="post" action="{{ route('testimonial.update', $all_testimonial->id) }}" enctype="multipart/form-data">

                                                @csrf

                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label for="Title" class="form-label">Testimonial Title</label>
                                                        <input type="text" id="Title" class="form-control" name="test_title" value="{{ $all_testimonial->test_title }}" placeholder="Enter here.....">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="Image" class="form-label">Testimonial Image</label>
                                                        <input class="form-control" type="file" name="test_img" id="Image">
                                                        <img src="{{ asset($all_testimonial->test_img) }}" alt="" style="width: 110px;">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="Description" class="form-label">Testimonial Description</label>
                                                        <textarea class="form-control" id="Description" name="test_desc" rows="3">{{ $all_testimonial->test_desc }}</textarea>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="Bussiness" class="form-label">Bussiness Type</label>
                                                        <input type="text" id="Bussiness" class="form-control" name="business_type" value="{{ $all_testimonial->business_type }}" placeholder="Enter here.....">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="Link" class="form-label">Links</label>
                                                        <input type="text" id="Link" class="form-control" name="test_link" value="{{ $all_testimonial->test_link }}" placeholder="Enter here.....">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="Status" class="form-label">Status</label>
                                                        <select class="form-select" id="Status" aria-label="Default select example" name="status">
                                                        <option selected="" disabled>Select the status menu</option>
                                                        <option value="1" @if( $all_testimonial->status === 1 ) selected @endif>Active</option>
                                                        <option value="2" @if( $all_testimonial->status === 2 ) selected @endif>InActive</option>
                                                        </select>
                                                    </div>

                                                    <div class="modal-footer">
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
                  <h5 class="modal-title" id="exampleModalLabel3">Add Testimonial Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="post" action="{{ route('testimonial.store') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="mb-3">
                                <label for="Title" class="form-label">Testimonial Title</label>
                                <input type="text" id="Title" class="form-control" name="test_title" placeholder="Enter here.....">
                            </div>

                            <div class="mb-3">
                                <label for="Image" class="form-label">Testimonial Image</label>
                                <input class="form-control" type="file" name="test_img" id="Image">
                            </div>

                            <div class="mb-3">
                                <label for="Description" class="form-label">Testimonial Description</label>
                                <textarea class="form-control" id="Description" name="test_desc" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="Bussiness" class="form-label">Bussiness Type</label>
                                <input type="text" id="Bussiness" class="form-control" name="business_type" placeholder="Enter here.....">
                            </div>

                            <div class="mb-3">
                                <label for="Link" class="form-label">Links</label>
                                <input type="text" id="Link" class="form-control" name="test_link" placeholder="Enter here.....">
                            </div>

                            <div class="mb-3">
                                <label for="Status" class="form-label">Status</label>
                                <select class="form-select" id="Status" aria-label="Default select example" name="status">
                                   <option selected="" disabled>Select the status menu</option>
                                   <option value="1">Active</option>
                                   <option value="2">InActive</option>
                                </select>
                            </div>

                            <div class="modal-footer">
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

