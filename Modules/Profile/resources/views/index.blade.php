@extends('layouts.master')

@section('title-header', __('Profile'))
@section('nav-header')
    <li class="breadcrumb-item"><a href="javascript:void(0);">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{__('Profile')}}</li>
@endsection


@section('content')

    <!-- row -->
    <div class="row row-sm">
        <!-- Col -->
        <div class="col-lg-4">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="pl-0">
                        <div class="main-profile-overview">
                            <div class="main-img-user profile-user">
                                <img alt="" src="{{URL::asset('assets/back/img/faces/6.jpg')}}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
                            </div>
                            <div class="d-flex justify-content-between mg-b-20">
                                <div>
                                    <h5 class="main-profile-name">Petey Cruiser</h5>
                                    <p class="main-profile-name-text">Web Designer</p>
                                </div>
                            </div>
                            <h6>Bio</h6>
                            <div class="main-profile-bio">
                                pleasure rationally encounter but because pursue consequences that are extremely painful.occur in which toil and pain can procure him some great pleasure.. <a href="">More</a>
                            </div><!-- main-profile-bio -->
                            <div class="row">
                                <div class="col-md-4 col mb20">
                                    <h5>947</h5>
                                    <h6 class="text-small text-muted mb-0">Followers</h6>
                                </div>
                                <div class="col-md-4 col mb20">
                                    <h5>583</h5>
                                    <h6 class="text-small text-muted mb-0">Tweets</h6>
                                </div>
                                <div class="col-md-4 col mb20">
                                    <h5>48</h5>
                                    <h6 class="text-small text-muted mb-0">Posts</h6>
                                </div>
                            </div>
                            <hr class="mg-y-30">
                            <label class="main-content-label tx-13 mg-b-20">Social</label>
                            <div class="main-profile-social-list">
                                <div class="media">
                                    <div class="media-icon bg-primary-transparent text-primary">
                                        <i class="icon ion-logo-github"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Github</span> <a href="">github.com/spruko</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-success-transparent text-success">
                                        <i class="icon ion-logo-twitter"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Twitter</span> <a href="">twitter.com/spruko.me</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-info-transparent text-info">
                                        <i class="icon ion-logo-linkedin"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Linkedin</span> <a href="">linkedin.com/in/spruko</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-danger-transparent text-danger">
                                        <i class="icon ion-md-link"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>My Portfolio</span> <a href="">spruko.com/</a>
                                    </div>
                                </div>
                            </div>
                            <hr class="mg-y-30">
                            <h6>Skills</h6>
                            <div class="skill-bar mb-4 clearfix mt-3">
                                <span>HTML5 / CSS3</span>
                                <div class="progress mt-2">
                                    <div class="progress-bar bg-primary-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%"></div>
                                </div>
                            </div>
                            <!--skill bar-->
                            <div class="skill-bar mb-4 clearfix">
                                <span>Javascript</span>
                                <div class="progress mt-2">
                                    <div class="progress-bar bg-danger-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 89%"></div>
                                </div>
                            </div>
                            <!--skill bar-->
                            <div class="skill-bar mb-4 clearfix">
                                <span>Bootstrap</span>
                                <div class="progress mt-2">
                                    <div class="progress-bar bg-success-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 80%"></div>
                                </div>
                            </div>
                            <!--skill bar-->
                            <div class="skill-bar clearfix">
                                <span>Coffee</span>
                                <div class="progress mt-2">
                                    <div class="progress-bar bg-info-gradient" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
                                </div>
                            </div>
                            <!--skill bar-->
                        </div><!-- main-profile-overview -->
                    </div>
                </div>
            </div>
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label tx-13 mg-b-25">
                        Conatct
                    </div>
                    <div class="main-profile-contact-list">
                        <div class="media">
                            <div class="media-icon bg-primary-transparent text-primary">
                                <i class="icon ion-md-phone-portrait"></i>
                            </div>
                            <div class="media-body">
                                <span>Mobile</span>
                                <div>
                                    +245 354 654
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-icon bg-success-transparent text-success">
                                <i class="icon ion-logo-slack"></i>
                            </div>
                            <div class="media-body">
                                <span>Slack</span>
                                <div>
                                    @spruko.w
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-icon bg-info-transparent text-info">
                                <i class="icon ion-md-locate"></i>
                            </div>
                            <div class="media-body">
                                <span>Current Address</span>
                                <div>
                                    San Francisco, CA
                                </div>
                            </div>
                        </div>
                    </div><!-- main-profile-contact-list -->
                </div>
            </div>
        </div>

        <!-- Col -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4 main-content-label">{{ __('Personal Information') }}</div>
                    {{-- <form class="form-horizontal"> --}}

                    @include('profile::partials.update-profile-information-form')
                    {{-- @include('profile::partials.update-password-form') --}}





                    {{-- </form> --}}
                </div>
                <div class="card-body">
                    <div class="mb-4 main-content-label">{{ __('Update Password') }}</div>
                    {{-- <form class="form-horizontal"> --}}

                    {{-- @include('profile::partials.update-profile-information-form') --}}
                    @include('profile::partials.update-password-form')





                    {{-- </form> --}}
                </div>
                <div class="card-footer text-left">
                    @include('profile::partials.delete-user-form')

                    {{-- <button type="submit" class="btn btn-primary waves-effect waves-light">Update Profile</button> --}}
                </div>
            </div>
        </div>
        <!-- /Col -->
    </div>
    <!-- row closed -->
@endsection
