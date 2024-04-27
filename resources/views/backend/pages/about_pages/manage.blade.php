@extends('backend.layout.template')

@push('title')
        <title>Dashboard - About Page</title>
@endpush

@section('body-content')

    <div class="card">
        <div class="card-title">
            <h5>Manage About Section</h5>
        </div>

        <div class="card-body">

            @if ( !empty($about) )
                <form method="POST" action="{{ route('about.update', $about->id) }}" enctype="multipart/form-data">
            @else
                <form method="POST" action="{{ route('about.store') }}" enctype="multipart/form-data">
            @endif


                @csrf

                <div class="row">
                    <div class="col mb-3">
                        <label for="nameLarge" class="form-label">About Title</label>
                        <input type="text" id="nameLarge" class="form-control" name="about_title"
                         @if ( $about )
                             value="{{ $about->about_title }}"
                         @endif
                        placeholder="Enter your name">
                    </div>

                    <div class="mb-3">
                        <label for="Description" class="form-label">About Description</label>
                        <textarea class="form-control" id="Description" name="about_desc" rows="3">@if ($about){{ $about->about_desc}}@endif
                        </textarea>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">About Image</label>
                        <input class="form-control" type="file" name="about_img" id="formFile">
                        @if ( $about )
                            <img src="{{ asset($about->about_img) }}" alt="" style="width: 110px;">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="btn" class="form-label">Action Button Link</label>
                        <input type="text" id="btn" class="form-control" name="about_btn"
                        @if ( $about )
                         value="{{ $about->about_btn }}"
                        @endif
                          placeholder="Enter your designation">
                    </div>

                    <div class="mb-3">
                        <label for="Status" class="form-label">Status</label>
                        <select class="form-select" id="Status" aria-label="Default select example" name="status">
                        <option selected="" disabled="">Select the status menu</option>
                            @if ( $about )
                               <option value="1" @if( $about->status === 1 ) selected @endif>Active</option>
                               <option value="2" @if( $about->status === 2 ) selected @endif>InActive</option>
                            @else
                               <option value="1">Active</option>
                               <option value="2">InActive</option>
                            @endif

                        </select>
                    </div>

                    <div class="modal-footer">
                        @if ( $about )
                           <button type="submit" class="btn btn-primary">Update</button>
                        @else
                           <button type="submit" class="btn btn-primary">Submit</button>
                        @endif

                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection

