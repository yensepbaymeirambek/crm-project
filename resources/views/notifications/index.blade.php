@extends('layout.main')
@section('content')
    <div class="container">
        <div class="filter">
            <div></div>
            <div style="display: flex">
                <select class="minimal">
                    <option selected value="today">Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="lastseven">Last 7 Days</option>
                    <option value="lastthird">Last 30 Days</option>
                    <option value="thisweek">This Week</option>
                    <option value="lastweek">Last Week</option>
                    <option value="thismonth">This Month</option>
                    <option value="lastmonth">Last Month</option>
                    <option value="thisyear">This Year</option>
                    <option value="lastyear">Last Year</option>
                </select>
                <select class="minimal" name="status">
                    <option selected disabled>Recent</option>
                </select>
            </div>
        </div>
        <div class="notify-box">
            <div class="error"></div>
            <div class="notify_header">
                <div class="notify_title">Attention Notification</div>
                <div class="time">23:59</div>
            </div>
            <div class="desc">Hello, Jake! You forgot to submit a ...</div>
        </div>
        <div class="notify-box">
            <div class="success-box"></div>
            <div class="notify_header">
                <div class="notify_title">Success Notification</div>
                <div class="time">23:59</div>
            </div>
            <div class="desc">Good Job, Jake! Your work sent to ...</div>
        </div>
        <div class="notify-box">
            <div class="warning"></div>
            <div class="notify_header">
                <div class="notify_title">Neutral Notification</div>
                <div class="time">23:59</div>
            </div>
            <div class="desc">Your work is in progress. Please, remember to ...</div>
        </div>
    </div>
@endsection
