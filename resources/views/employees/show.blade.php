@extends('layout.main')
@section('content')
    <div class="container">
        <div class="container--inner">
            <div class="breadcrumb">
                <div class="main-page">{{ __('shared.employee') }}</div>
                <img style="margin-top: auto; margin-bottom: auto" src="{{asset('images/arrow_left.svg')}}" width="10" height="10" class="arrow-left">
                <div class="username">{{$result[0]->fullname}}</div>
            </div>
            <div class="profile">
                <img src="{{asset('images/empl_avatar.svg')}}" width="187" height="187" alt="">
                <div class="names">
                    <div class="job">{{$result[0]->job_role}}</div>
                    <div class="username">{{$result[0]->fullname}}</div>
                    <button class="assign">
                        <img style="margin-right: 8px" src="{{asset('images/plus_liner.svg')}}" width="25" height="25" alt="">
                        {{ __('shared.assign') }}
                    </button>
                </div>
                <div class="contact-info">
                    <div class="job">{{ __('shared.jobtype') }}: <p class="job-title"> {{$result[0]->job_role}}</p> </div>
                    <div class="job">{{ __('shared.workhours') }}: <p class="job-title"> 9:00 - 17:00</p> </div>
                    <div class="job">{{ __('shared.email') }}: <p class="job-title"> whereismy@mail.here</p> </div>
                    <div class="job">{{ __('shared.phone') }}: <p class="job-title"> +7-777-77-77</p> </div>
                </div>
            </div>
            <div class="breadcrumb">
                <div class="main-page">{{ __('shared.projects') }}</div>
            </div>
            <div class="projects">
                @foreach($projects as $project)
                <div class="post">
                    <img src="{{asset('images/post-avatar.svg')}}" width="200" height="200" alt="" style="margin-top: 40px; margin-right: 40px; margin-left: 40px; margin-bottom: 15px">
                    <div class="name">{{$project->name}}</div>
                    <div class="description">{{$project->desc}}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
