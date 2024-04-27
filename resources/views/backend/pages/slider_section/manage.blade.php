@extends('backend.layout.template')

@push('title')
        <title>Dashboard - Slider Page</title>
@endpush

@section('body-content')

    <div class="card">
        <div class="card-title">
            <h5>Manage Slider Section</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add">Add Slider</button>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                @if ( $all_sliders->count() === 0 )
                    <div class="alert alert-danger" role="alert">This is no data here</div>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#SL.</th>
                                <th>Slider Title</th>
                                <th>Slider Image</th>
                                <th>Slider Description</th>
                                <th>Background Color</th>
                                <th>First Button Link</th>
                                <th>Second Button Link</th>
                                <th>Slider Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($all_sliders as $row => $all_slider)
                            <tr>
                                <td>{{ $row + 1 }}</td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $all_slider->slider_title }}</strong>
                                </td>
                                <td>
                                    <img src="{{ asset($all_slider->slider_img) }}" alt="Avatar" class="rounded-circle" style="width: 75px;">
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $all_slider->slider_desc }}</strong>
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $all_slider->slider_bg }}</strong>
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $all_slider->first_btn_link }}</strong>
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $all_slider->second_btn_link }}</strong>
                                </td>
                                <td>
                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $all_slider->slider_type }}</strong>
                                </td>
                                <td>
                                    @if ( $all_slider->status === 1 )
                                       <span class="badge bg-label-primary me-1">Active</span>
                                    @else
                                       <span class="badge bg-label-danger me-1">InActive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <span class="action_btn text-primary cursor-pointer" data-bs-toggle="modal" data-bs-target="#edit{{ $all_slider->id }}"><i class="bx bx-edit-alt me-1"></i></span>
                                        <a class="action_btn ms-2 text-danger" href="{{ route('slider.delete', $all_slider->id ) }}"><i class="bx bx-trash me-1"></i></a>
                                    </div>
                                </td>
                            </tr>

                                {{-- Modal for edit --}}
                                <div class="modal fade" id="edit{{ $all_slider->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel3">Update Slider Data</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        @php
                                            $updateSlider = app\Models\Slider::where('id', $all_slider->id)->first();
                                        @endphp

                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('slider.update', $updateSlider->id) }}" enctype="multipart/form-data">

                                                @csrf

                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label for="Title" class="form-label">Slider Title</label>
                                                        <input type="text" id="Title" class="form-control" name="slider_title" value="{{ $updateSlider->slider_title }}" placeholder="Enter here.....">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="Image" class="form-label">Slider Image</label>
                                                        <input class="form-control" type="file" name="slider_img" id="Image">
                                                        <img src="{{ asset($updateSlider->slider_img) }}" alt="" style="width: 75px;">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="Description" class="form-label">Slider Description</label>
                                                        <textarea class="form-control" id="Description" name="slider_desc" rows="3">{{ $updateSlider->slider_desc }}</textarea>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="first_btn" class="form-label">Background Color Code</label>
                                                        <input type="text" id="first_btn" class="form-control" name="slider_bg" value="{{ $updateSlider->slider_bg }}" placeholder="Enter here.....">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="first_btn" class="form-label">First Button Link</label>
                                                        <input type="text" id="first_btn" class="form-control" name="first_btn_link" value="{{ $updateSlider->first_btn_link }}" placeholder="Enter here.....">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="second_btn" class="form-label">Second Button Link</label>
                                                        <input type="text" id="second_btn" class="form-control" name="second_btn_link" value="{{ $updateSlider->second_btn_link }}" placeholder="Enter here.....">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="Type" class="form-label">Type</label>
                                                        <input type="text" id="Type" class="form-control" name="slider_type" value="{{ $updateSlider->slider_type }}" placeholder="Enter here.....">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="Status" class="form-label">Status</label>
                                                        <select class="form-select" id="Status" aria-label="Default select example" name="status">
                                                        <option selected="" disabled="">Select the status menu</option>
                                                        <option value="1" @if( $updateSlider->status === 1 ) selected @endif>Active</option>
                                                        <option value="2" @if( $updateSlider->status === 2 ) selected @endif>InActive</option>
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
                  <h5 class="modal-title" id="exampleModalLabel3">Add Slider Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="mb-3">
                                <label for="Title" class="form-label">Slider Title</label>
                                <input type="text" id="Title" class="form-control" name="slider_title" placeholder="Enter here.....">
                            </div>

                            <div class="mb-3">
                                <label for="Image" class="form-label">Slider Image</label>
                                <input class="form-control" type="file" name="slider_img" id="Image">
                            </div>

                            <div class="mb-3">
                                <label for="Description" class="form-label">Slider Description</label>
                                <textarea class="form-control" id="Description" name="slider_desc" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="first_btn" class="form-label">Background Color Code</label>
                                <input type="text" id="first_btn" class="form-control" name="slider_bg" placeholder="Enter here.....">
                            </div>

                            <div class="mb-3">
                                <label for="first_btn" class="form-label">First Button Link</label>
                                <input type="text" id="first_btn" class="form-control" name="first_btn_link" placeholder="Enter here.....">
                            </div>

                            <div class="mb-3">
                                <label for="second_btn" class="form-label">Second Button Link</label>
                                <input type="text" id="second_btn" class="form-control" name="second_btn_link" placeholder="Enter here.....">
                            </div>

                            <div class="mb-3">
                                <label for="Type" class="form-label">Type</label>
                                <input type="text" id="Type" class="form-control" name="slider_type" placeholder="Enter here.....">
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

