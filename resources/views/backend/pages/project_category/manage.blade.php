@extends('backend.layout.template')

@push('title')
        <title>Dashboard - Project Category Page</title>
@endpush

@section('body-content')

    <div class="card">
        <div class="card-title">
            <h5>Manage Project Category Section</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add">Add Project Category</button>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                @if ( $project_cats->count() === 0 )
                   <div class="alert alert-danger" role="alert">This is no data here</div>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#SL.</th>
                                <th>Category Name</th>
                                <th>Category Slug</th>
                                <th>Category Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($project_cats as $row => $project_cat)
                            <tr>
                                <td>{{ $row + 1 }}</td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $project_cat->category_name }}</strong>
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $project_cat->category_slug  }}</strong>
                                </td>
                                <td>
                                    <img src="{{ asset($project_cat->category_img) }}" alt="Avatar" class="rounded-circle" style="width: 75px;">
                                </td>
                                <td>
                                    @if ( $project_cat->status === 1 )
                                        <span class="badge bg-label-primary me-1">Active</span>
                                    @else
                                        <span class="badge bg-label-danger me-1">InActive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="action_btn text-primary cursor-pointer" data-bs-toggle="modal" data-bs-target="#edit{{ $project_cat->id }}"><i class="bx bx-edit-alt me-1"></i></span>
                                        <a class="action_btn ms-2 text-danger" href="{{ route('project_cat.delete', $project_cat->id ) }}"><i class="bx bx-trash me-1"></i></a>
                                    </div>
                                </td>
                            </tr>

                                {{-- Modal for edit --}}
                                <div class="modal fade" id="edit{{ $project_cat->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel3">Update Service Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form method="post" action="{{ route('project_cat.update', $project_cat->id ) }}" enctype="multipart/form-data">

                                                @csrf

                                                <div class="row">
                                                    <div class=" mb-3">
                                                        <label for="Category" class="form-label">Project Category Name</label>
                                                        <input type="text" id="Category" class="form-control" value="{{ $project_cat->category_name }}" name="category_name" placeholder="Enter here.....">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="Image" class="form-label">Category Image</label>
                                                        <input class="form-control" type="file" id="Image" name="category_img">
                                                        <img src="{{ asset($project_cat->category_img) }}" alt="Avatar" style="width: 110px;">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="Status" class="form-label">Status</label>
                                                        <select class="form-select" id="Status" aria-label="Default select example" name="status">
                                                        <option selected="">Select the status menu</option>
                                                        <option value="1" @if( $project_cat->status === 1 ) selected @endif>Active</option>
                                                        <option value="2" @if( $project_cat->status === 2 ) selected @endif>InActive</option>
                                                        </select>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                        Close</button>
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
                  <h5 class="modal-title" id="exampleModalLabel3">Add Project Category Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('project_cat.store') }}" enctype="multipart/form-data">

                        @csrf

                            <div class=" mb-3">
                                <label for="Category" class="form-label">Project Category Name</label>
                                <input type="text" id="Category" class="form-control" name="category_name" placeholder="Enter here.....">
                            </div>

                            <div class="mb-3">
                                <label for="Image" class="form-label">Category Image</label>
                                <input class="form-control" type="file" name="category_img" id="Image">
                            </div>

                            <div class="mb-3">
                                <label for="Status" class="form-label">Status</label>
                                <select class="form-select" id="Status" aria-label="Default select example" name="status">
                                <option selected="" disabled="">Select the status menu</option>
                                  <option value="1">Active</option>
                                  <option value="2">InActive</option>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
              </div>
            </div>
        </div>

    </div>

@endsection

