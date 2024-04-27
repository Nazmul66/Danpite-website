@extends('backend.layout.template')

@push('title')
        <title>Dashboard - Project Page</title>
@endpush

@section('body-content')

    <div class="card">
        <div class="card-title">
            <h5>Manage Project Section</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add">Add Project</button>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                @if ( $projects->count() === 0 )
                   <div class="alert alert-danger" role="alert">This is no data here</div>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#SL.</th>
                                <th>Project Category</th>
                                <th>Project Title</th>
                                <th>Project Slug</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($projects as $row => $project)
                            <tr>
                                <td>{{ $row + 1 }}</td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $project->project_cat_name }}</strong>
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $project->project_title  }}</strong>
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $project->project_slug  }}</strong>
                                </td>
                                <td>
                                    <img src="{{ asset($project->project_img) }}" alt="Avatar" class="rounded-circle" style="width: 75px;">
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $project->project_desc  }}</strong>
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $project->project_link  }}</strong>
                                </td>
                                <td>
                                    @if ( $project->status === 1 )
                                        <span class="badge bg-label-primary me-1">Active</span>
                                    @else
                                        <span class="badge bg-label-danger me-1">InActive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="action_btn text-primary cursor-pointer" data-bs-toggle="modal" data-bs-target="#edit{{ $project->id }}"><i class="bx bx-edit-alt me-1"></i></span>
                                        <a class="action_btn ms-2 text-danger" href="{{ route('project.delete', $project->id ) }}"><i class="bx bx-trash me-1"></i></a>
                                    </div>
                                </td>
                            </tr>

                                {{-- Modal for edit --}}
                                <div class="modal fade" id="edit{{ $project->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel3">Update Service Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('project.update', $project->id) }}" enctype="multipart/form-data">

                                                @csrf

                                                 <div class="mb-3">
                                                     <label for="Title" class="form-label">Project Category</label>
                                                     <select class="form-select" id="Title" name="project_cat_name">
                                                         <option selected="" disabled="">Select the status menu</option>
                                                           @foreach ($projectCats as $projectCat)
                                                              <option value="{{ Str::slug( $projectCat->category_name ) }}" @if( $projectCat->category_slug == $project->project_cat_name ) selected @endif>{{ $projectCat->category_name }}</option>
                                                           @endforeach
                                                      </select>
                                                 </div>


                                                <div class="mb-3">
                                                    <label for="Link" class="form-label">Project Title</label>
                                                    <input type="text" id="Link" class="form-control" name="project_title"
                                                     @if ( $project )
                                                         value="{{ $project->project_title }}"
                                                     @endif
                                                    placeholder="Enter here.....">
                                                </div>

                                                 <div class="mb-3">
                                                     <label for="Image" class="form-label">Project Image</label>
                                                     <input class="form-control" type="file" name="project_img" id="Image">
                                                     <img src="{{ asset($project->project_img) }}" alt="Avatar" style="width: 110px;">
                                                 </div>

                                                 <div class="mb-3">
                                                     <label for="Description" class="form-label">Project Description</label>
                                                     <textarea class="form-control" id="Description" name="project_desc" rows="3">{{ $project->project_desc }}</textarea>
                                                 </div>

                                                 <div class="mb-3">
                                                     <label for="Link" class="form-label">Project Links</label>
                                                     <input type="text" id="Link" class="form-control" name="project_link"
                                                      @if ( $project )
                                                         value="{{ $project->project_link }}"
                                                      @endif
                                                     placeholder="Enter here.....">
                                                 </div>

                                                 <div class="mb-3">
                                                     <label for="Status" class="form-label">Status</label>
                                                     <select class="form-select" id="Status" aria-label="Default select example" name="status">
                                                        <option selected="" disabled="">Select the status menu</option>
                                                        <option value="1" @if( $project->status === 1 ) selected @endif>Active</option>
                                                        <option value="2" @if( $project->status === 2 ) selected @endif>InActive</option>
                                                     </select>
                                                 </div>

                                                 <div class="modal-footer">
                                                     <button type="submit" class="btn btn-primary">Update</button>
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
                  <h5 class="modal-title" id="exampleModalLabel3">Add Project Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('project.store') }}" enctype="multipart/form-data">

                           @csrf

                            <div class="mb-3">
                                <label for="Category" class="form-label">Project Category</label>
                                <select class="form-select" id="Category" name="project_cat_name">
                                    <option selected="" disabled="">Select the status menu</option>
                                      @foreach ($projectCats as $projectCat)
                                         <option value="{{ Str::slug( $projectCat->category_name ) }}">{{ $projectCat->category_name }}</option>
                                      @endforeach
                                 </select>
                            </div>

                            <div class="mb-3">
                                <label for="Link" class="form-label">Project Title</label>
                                <input type="text" id="Link" class="form-control" name="project_title" placeholder="Enter here.....">
                            </div>

                            <div class="mb-3">
                                <label for="Image" class="form-label">Project Image</label>
                                <input class="form-control" type="file" name="project_img" id="Image">
                            </div>

                            <div class="mb-3">
                                <label for="Description" class="form-label">Project Description</label>
                                <textarea class="form-control" id="Description" name="project_desc" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="Link" class="form-label">Project Links</label>
                                <input type="text" id="Link" class="form-control" name="project_link" placeholder="Enter here.....">
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

