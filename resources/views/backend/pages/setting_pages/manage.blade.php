@extends('backend.layout.template')

@push('title')
        <title>Dashboard - Setting Page</title>
@endpush

@section('body-content')

    <div class="card">
        <div class="card-title">
            <h5>Manage Setting Section</h5>
        </div>

        <div class="card-body">

            @if ( !empty( $setting ) )
                <form method="POST" action="{{ route('setting.update', $setting->id) }}" enctype="multipart/form-data">
            @else
                <form method="POST" action="{{ route('setting.store') }}" enctype="multipart/form-data">
            @endif

               @csrf

                <div class="row">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Website Logo</label>
                        <input class="form-control" type="file" name="logo" id="formFile">
                        @if ( $setting )
                            <img src="{{ asset($setting->logo) }}" alt="" style="width: 110px;">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="nameLarge" class="form-label">Whatsapp Link</label>
                        <input type="text" id="nameLarge" class="form-control" name="whatsapp_link"
                        @if ( $setting )
                            value="{{ $setting->whatsapp_link }}"
                        @endif
                        placeholder="Enter your whatsapp link">
                    </div>

                    <div class="mb-3">
                        <label for="Address" class="form-label">Address</label>
                        <textarea class="form-control" id="Address" name="address" accordion rows="3">@if ( $setting ){{ $setting->address }} @endif</textarea>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="Phone" class="form-label">Phone Number</label>
                            <input type="text" id="Phone" class="form-control" name="phone"
                            @if ( $setting )
                                value="{{ $setting->phone }}"
                            @endif
                            placeholder="Write here.........">
                        </div>

                        <div class="col mb-3">
                            <label for="Phoneo" class="form-label">Phone Number (Optional)</label>
                            <input type="text" id="Phoneo" class="form-control" name="phone_optional"
                            @if ( $setting )
                                value="{{ $setting->phone_optional }}"
                            @endif
                            placeholder="Write here (optional).........">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="Email" class="form-label">Email Address</label>
                            <input type="email" id="Email" class="form-control" name="email"
                            @if ( $setting )
                                value="{{ $setting->email }}"
                            @endif
                            placeholder="Write here.........">
                        </div>

                        <div class="col mb-3">
                            <label for="Emaild" class="form-label">Email Address (Optional)</label>
                            <input type="email" id="Emaild" class="form-control" name="email_optional"
                            @if ( $setting )
                                value="{{ $setting->email_optional }}"
                            @endif
                            placeholder="Write here (optional).........">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="Copyright" class="form-label">Company Copyright</label>
                        <input type="text" id="Copyright" class="form-control" name="copyright"
                        @if ( $setting )
                            value="{{ $setting->copyright }}"
                        @endif
                        placeholder="Write here.........">
                    </div>

                    <div class="mb-3">
                        <label for="Facebook" class="form-label">Facebook Link</label>
                        <input type="text" id="Facebook" class="form-control" name="fb_link"
                        @if ( $setting )
                            value="{{ $setting->fb_link }}"
                        @endif
                        placeholder="Enter your facebook link">
                    </div>

                    <div class="mb-3">
                        <label for="Youtube" class="form-label">Youtube Link</label>
                        <input type="text" id="Youtube" class="form-control" name="twitter_link"
                        @if ( $setting )
                            value="{{ $setting->twitter_link }}"
                        @endif
                        placeholder="Enter your youtube link">
                    </div>

                    <div class="mb-3">
                        <label for="Linkedin" class="form-label">Linkedin Link</label>
                        <input type="text" id="Linkedin" class="form-control " name="linkedin_link"
                        @if ( $setting )
                            value="{{ $setting->linkedin_link }}"
                        @endif
                        placeholder="Enter your linkedin link">
                    </div>

                    <div class="mb-3">
                        <label for="Address" class="form-label">Pixel / FB</label>
                        <textarea class="form-control" id="Address" name="pixel_FB" rows="3">@if ( $setting ){{ $setting->pixel_FB }} @endif</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="Address" class="form-label">Google Analytics</label>
                        <textarea class="form-control" id="Address" name="google_analytics" rows="3">@if ( $setting ){{ $setting->google_analytics }} @endif</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="Address" class="form-label">Chatbot</label>
                        <textarea class="form-control" id="Address" name="chatbot" rows="3">@if ( $setting ){{ $setting->chatbot }} @endif</textarea>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="Years" class="form-label">Years</label>
                            <input type="number" id="Years" class="form-control" name="years"
                            @if ( $setting )
                                value="{{ $setting->years }}"
                            @endif
                            placeholder="">
                        </div>

                        <div class="col mb-3">
                            <label for="Team" class="form-label">Team Member</label>
                            <input type="number" id="Team" class="form-control"
                            @if ( $setting )
                                value="{{ $setting->team_members }}"
                            @endif
                            name="team_members" placeholder="">
                        </div>

                        <div class="col mb-3">
                            <label for="Client" class="form-label">Satisfy Client</label>
                            <input type="number" id="Client" class="form-control"
                            @if ( $setting )
                                value="{{ $setting->satisfied_client }}"
                            @endif
                            name="satisfied_client" placeholder="">
                        </div>

                        <div class="col mb-3">
                            <label for="Projects" class="form-label">Complete Projects</label>
                            <input type="number" id="Projects" class="form-control"
                            @if ( $setting )
                                value="{{ $setting->complete_projects }}"
                            @endif
                            name="complete_projects" placeholder="">
                        </div>
                    </div>

                    <div class="modal-footer">
                        @if ( $setting )
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

