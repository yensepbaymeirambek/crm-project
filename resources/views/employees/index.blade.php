@extends('layout.main')
@section('content')
    <button class="add" id="myBtn"><img src="{{asset('images/plus_liner.svg')}}" width="46" height="46" alt=""></button>

    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <p>{{ __('shared.createtask') }}</p>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('store', app()->getLocale())}}" style="margin-right:20px; display: block; margin-top: 30px">
                    {{ csrf_field() }}
                    <label for="project" style="font-family: revert;font-size: 20px;line-height: 35px;display: flex;align-items: center;text-align: center;letter-spacing: 0.05em;text-transform: capitalize;color: rgba(0, 0, 0, 0.5);">Project</label>
                    <select name="project" id="project" class="minimal" style="margin-top: 10px;margin-left: 0 !important;background-color: rgba(0, 0, 0, 0.1);border-radius: 5px;">
                        <option value="mentorship">Mentorship</option>
                    </select>
                    <div style="display: block; margin-right:20px; margin-top: 35px">
                        <label for="employee"  style="color: #000000; font-size: 20px;line-height: 35px;">Employee</label>
                        <input name="employee" id="employee" class="modal-input"/>
                    </div>
                    <div style="display: block; margin-right:20px; margin-top: 25px">
                        <label for="activity" style="color: #000000; font-size: 20px;line-height: 35px;">Activity</label>
                        <input name="activity" type="time" id="activity" class="modal-input"/>
                    </div>
                    <div style="display: block; margin-right:20px; margin-top: 35px">
                        <label for="job"  style="color: #000000; font-size: 20px;line-height: 35px;">Job</label>
                        <input name="job" id="job" class="modal-input"/>
                    </div>
                    <div style="display: block; margin-right: 20px; margin-top: 25px;">
                        <label for="description" style="font-family: revert;font-size: 20px;line-height: 35px;display: flex;align-items: center;text-align: center;letter-spacing: 0.05em;text-transform: capitalize;color: rgba(0, 0, 0, 0.5);">Description</label>
                        <textarea rows="6" style="background: rgba(0, 0, 0, 0.07); width:100%; border-radius: 5px;" name="description" id="description"> </textarea>
                    </div>
                    <div style="display: block; margin-right:20px; margin-top: 25px">
                        <label for="number" style="color: #000000; font-size: 20px;line-height: 35px; width: 50% !important;">Total Time</label>
                        <input name="time" type="time" id="time" class="modal-input"/>
                    </div>
                    <div style="display: block; margin-right:20px; margin-top: 25px; margin-bottom: 10px">
                        <label for="alarm" style="color: #000000; font-size: 20px;line-height: 35px; width: 30% !important;">Alarm</label>
                        <input name="alarm" type="time" id="alarm" class="modal-input"/>
                    </div>
                    @if($errors->any())
                        <p class="text-danger">{{$errors->first('error')}}</p>
                    @endif
                    <div style="display: flex; justify-content: flex-end">
                        <div style="display: flex">
                            <button type="submit" class="create">Create</button>
                            <div class="close">Cancel</div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
    <script>
        var modal = document.getElementById("myModal");

        var btn = document.getElementById("myBtn");

        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <div class="container">
        <form method="get" action="{{route('employees',app()->getLocale())}}" class="filter">
            {{ csrf_field() }}
            <div class="left-inner-addon input-container">
                <img src="{{asset('images/search.svg')}}" width="37" height="37" alt="">
                <input type="text"
                       class="form-control"
                       placeholder="{{ __('shared.search') }}..." name="text"/>
                <input type="submit"
                       style="position: absolute; left: -9999px; width: 1px; height: 1px;"
                       tabindex="-1" />
            </div>
            <div style="display: flex">
                <select class="minimal" name="project">
                    <option selected disabled>{{ __('shared.projects') }}</option>
                    <option value="open">{{ __('shared.open') }}</option>
                    <option value="recent">{{ __('shared.recent') }}</option>
                    <option value="closed">{{ __('shared.closed') }}</option>
                </select>
                <select class="minimal">
                    <option selected disabled>{{ __('shared.executor') }}</option>
                </select>
                <select class="minimal" name="status">
                    <option selected disabled>{{ __('shared.status') }}</option>
                    <option value="done">{{ __('shared.done') }}</option>
                    <option value="in_process">{{ __('shared.in_process') }}</option>
                </select>
            </div>
        </form>

        @foreach($result as $res)
            <a href="{{route('employee', ['id'=>$res->id, 'locale'=>app()->getLocale()])}}" class="content">
                <div style="display: flex">
                    <img class="content-img" src="{{asset('images/user.svg')}}" width="50" height="50" alt="">
                    <div class="project-name">{{$res->name}}</div>
                    <div class="project-username"><p style="padding-left: 30px;padding-right: 30px;border-right: 1px solid rgba(0, 0, 0, 0.1);border-left: 1px solid rgba(0, 0, 0, 0.1);">{{$res->fullname}}</p></div>
                    <div class="project-status success"><div class="@if($res->status==='done') done @else in_process @endif">@if($res->status==='done') {{ __('shared.done') }} @else {{ __('shared.in_progress') }} @endif</div></div>
                </div>
                <div class="delete">
                    <img style="margin-bottom: auto; margin-top: auto;" src="{{asset('images/trash.svg')}}" width="30" height="30" alt="">
                </div>
            </a>
        @endforeach
    </div>
@endsection
