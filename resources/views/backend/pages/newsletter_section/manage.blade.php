@extends('backend.layout.template')

@push('title')
        <title>Dashboard - Newsletter Page</title>
@endpush

@section('body-content')

    <div class="card">
        <div class="card-title">
            <h5>Manage Newsletter Section</h5>
        </div>

        <div class="card-body">

            @if ( !empty( $newsletter ) )
                <form method="POST" action="{{ route('newsletter.update', $newsletter->id) }}">
            @else
                <form method="POST" action="{{ route('newsletter.store') }}">
            @endif

               @csrf

                <div class="row">
                    <div class="col mb-3">
                        <label for="nameLarge" class="form-label">Newsletter Title</label>
                        <input type="text" id="nameLarge" class="form-control" name="section_titles"
                        @if (  $newsletter )
                            value="{{ $newsletter->section_titles }}"
                        @endif
                        placeholder="Enter your name">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Newsletter Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="section_desc" rows="3">@if ( $newsletter ) {{ $newsletter->section_desc }} @endif</textarea>
                    </div>


                    <div class="mb-3">
                        <label for="section_bg" class="form-label">Background Color</label>
                        <input class="form-control" type="color" name="section_bg" id="section_bg"
                        @if ( $newsletter )
                            value="{{ $newsletter->section_bg }}"
                        @else
                           value="#ff0000"
                        @endif
                        >
                    </div>

                    <div class="mb-3">
                        <label for="Status" class="form-label">Status</label>
                        <select class="form-select" id="Status" aria-label="Default select example" name="status">
                        <option selected="" disabled="">Select the status menu</option>
                            @if ( $newsletter )
                               <option value="1" @if( $newsletter->status === 1 ) selected @endif>Active</option>
                               <option value="2" @if( $newsletter->status === 2 ) selected @endif>InActive</option>
                            @else
                               <option value="1">Active</option>
                               <option value="2">InActive</option>
                            @endif

                        </select>
                    </div>

                    <div class="modal-footer">
                        @if ( $newsletter )
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

