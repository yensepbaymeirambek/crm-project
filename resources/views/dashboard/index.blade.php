@extends('layout.main')
@section('content')
    <div class="container">
        <div class="filter">
            <div></div>
            <div style="display: flex">
                <div class="reload">
                    <img style="margin-top: auto; margin-bottom: auto;" src="{{asset('images/reload.svg')}}" width="30" height="30" alt="">
                </div>
                <select class="minimal">
                    <option selected value="today">{{ __('shared.today') }}</option>
                    <option value="yesterday">{{ __('shared.yesterday') }}</option>
                    <option value="lastseven">{{ __('shared.l7d') }}</option>
                    <option value="lastthird">{{ __('shared.l30d') }}</option>
                    <option value="thisweek">{{ __('shared.thisweek') }}</option>
                    <option value="lastweek">{{ __('shared.lastweek') }}</option>
                    <option value="thismonth">{{ __('shared.thiwmonth') }}</option>
                    <option value="lastmonth">{{ __('shared.lastmonth') }}</option>
                    <option value="thisyear">{{ __('shared.thisyear') }}</option>
                    <option value="lastyear">{{ __('shared.lastyear') }}</option>
                </select>
                <select class="minimal" name="status">
                    <option selected disabled>{{ __('shared.alluser') }}</option>
                </select>
            </div>
        </div>
        <div class="inner-wrap">
            <div class="inner-wrap__container">
                <div class="activities">Activities</div>
                <div class="dashboard">
                    @foreach($projects as $project)
                    <div class="dashboard-card">
                        <div class="box">
                            <div>
                                <div class="name">{{$project->name}}</div>
                                <div class="description">{{$project->desc}}</div>
                            </div>
                            <div>
                                <img style="margin-top: 40px; margin-right: 30px;" src="{{asset('images/user.svg')}}" width="48" height="48" alt="">
                            </div>
                        </div>
                        <div class="remaining-time">
                            {{$project->remaining_time}} {{ __('shared.hours') }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
