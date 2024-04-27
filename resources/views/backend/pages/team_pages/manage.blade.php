@extends('backend.layout.template')

@push('title')
        <title>Dashboard - Team Page</title>
@endpush

@section('body-content')

    <div class="card">
        <div class="card-title">
            <h5>Manage Team Section</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add">Add Person</button>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                @if ( $all_teams->count() === 0 )
                   <div class="alert alert-danger" role="alert">This is no data here</div>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#SL.</th>
                                <th>Person Name</th>
                                <th>Person Designation</th>
                                <th>Person Image</th>
                                <th>Facebook Link</th>
                                <th>Twitter Link</th>
                                <th>Linkedin Link</th>
                                <th>Instagram Link</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($all_teams as $row => $all_team)
                            <tr>
                                <td>{{ $row + 1 }}</td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $all_team->team_title }}</strong>
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $all_team->team_designation }}</strong>
                                </td>
                                <td>
                                    <img src="{{ asset($all_team->team_img) }}" alt="Avatar" class="rounded-circle" style="width: 75px;">
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <span class="badge bg-label-secondary">{{ $all_team->fb_link }}</span>
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i><span class="badge bg-label-secondary">{{ $all_team->twitter_link }}</span>
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i><span class="badge bg-label-secondary">{{ $all_team->linkedin_link }}</span>
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i><span class="badge bg-label-secondary">{{ $all_team->insta_link }}</span>
                                </td>
                                <td>
                                    @if ( $all_team->status === 1 )
                                       <span class="badge bg-label-primary me-1">Active</span>
                                    @else
                                       <span class="badge bg-label-danger me-1">InActive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="action_btn text-primary cursor-pointer" data-bs-toggle="modal" data-bs-target="#edit{{ $all_team->id }}"><i class="bx bx-edit-alt me-1"></i></span>
                                        <a class="action_btn ms-2 text-danger" href="{{ route('team.delete', $all_team->id ) }}"><i class="bx bx-trash me-1"></i></a>
                                    </div>
                                </td>
                            </tr>

                                {{-- Modal for edit --}}
                                <div class="modal fade" id="edit{{ $all_team->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel3">Update Service Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form method="post" action="{{ route('team.update', $all_team->id ) }}" enctype="multipart/form-data">

                                                @csrf

                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="team_title" class="form-label">Person Name</label>
                                                        <input type="text" id="team_title" class="form-control" value="{{ $all_team->team_title }}" name="team_title" placeholder="Enter your name">
                                                    </div>

                                                    <div class="col mb-3">
                                                        <label for="team_designation" class="form-label">Person Designation</label>
                                                        <input type="text" id="team_designation" class="form-control" value="{{ $all_team->team_designation }}" name="team_designation" placeholder="Enter your designation">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="team_img" class="form-label">Person Image</label>
                                                        <input class="form-control" type="file" name="team_img" id="team_img">
                                                        <img src="{{ asset($all_team->team_img) }}" alt="Avatar" style="width: 110px;">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="fb_link" class="form-label">Facebook Link</label>
                                                        <input type="text" id="fb_link" class="form-control" name="fb_link" value="{{ $all_team->fb_link }}" placeholder="Enter your facebook link">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="twitter_link" class="form-label">Twitter Link</label>
                                                        <input type="text" id="twitter_link" class="form-control" name="twitter_link" value="{{ $all_team->twitter_link }}" placeholder="Enter your Twitter link">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="linkedin_link" class="form-label">Linkedin Link</label>
                                                        <input type="text" id="linkedin_link" class="form-control" name="linkedin_link" value="{{ $all_team->linkedin_link }}" placeholder="Enter your linkedin link">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="insta_link" class="form-label">Linkedin Link</label>
                                                        <input type="text" id="insta_link" class="form-control" name="insta_link" value="{{ $all_team->insta_link }}" placeholder="Enter your instagram link">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="Status" class="form-label">Status</label>
                                                        <select class="form-select" id="Status" aria-label="Default select example" name="status">
                                                            <option selected="" disabled="">Select the status menu</option>
                                                            <option value="1" @if( $all_team->status === 1 ) selected @endif>Active</option>
                                                            <option value="2" @if( $all_team->status === 2 ) selected @endif>InActive</option>
                                                        </select>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                          Close
                                                        </button>
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
                  <h5 class="modal-title" id="exampleModalLabel3">Add Person Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="post" action="{{ route('team.store') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameLarge" class="form-label">Person Name</label>
                                <input type="text" id="nameLarge" class="form-control" name="team_title" placeholder="Enter your name">
                            </div>

                            <div class="col mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Person Designation</label>
                                <input type="text" id="nameLarge" class="form-control" name="team_designation" placeholder="Enter your designation">
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Person Image</label>
                                <input class="form-control" type="file" name="team_img" id="formFile">
                            </div>

                            <div class="mb-3">
                                <label for="fb_link" class="form-label">Facebook Link</label>
                                <input type="text" id="fb_link" class="form-control" name="fb_link" placeholder="Enter your facebook link">
                            </div>

                            <div class="mb-3">
                                <label for="twitter_link" class="form-label">Twitter Link</label>
                                <input type="text" id="twitter_link" class="form-control" name="twitter_link" placeholder="Enter your Twitter link">
                            </div>

                            <div class="mb-3">
                                <label for="linkedin_link" class="form-label">Linkedin Link</label>
                                <input type="text" id="linkedin_link" class="form-control" name="linkedin_link" placeholder="Enter your linkedin link">
                            </div>

                            <div class="mb-3">
                                <label for="insta_link" class="form-label">Instagram Link</label>
                                <input type="text" id="insta_link" class="form-control" name="insta_link" placeholder="Enter your instagram link">
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
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
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

