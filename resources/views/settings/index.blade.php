@extends('layout.main')
@section('content')
    <div class="container">
        <div style="display: flex">
            <div class="block">
                <div class="settings">
                    <img style="margin-top: auto; margin-bottom: auto" src="{{asset('images/globalnet.svg')}}" width="30" height="30" alt="">
                    <div class="lang">{{ __('shared.lang') }}</div>
                </div>
                <div class="settings" style="margin-top: 100px">
                    <img style="margin-top: auto; margin-bottom: auto" src="{{asset('images/lock.svg')}}" width="30" height="30" alt="">
                    <div class="lang">{{ __('shared.password') }}</div>
                </div>
            </div>
            <div class="vr"></div>
            <div class="secondblock">
            <div class="settings">
                <div class="lang">{{ __('shared.change_lang') }}:</div>
                <form method="post" action="{{route('localization', app()->getLocale())}}">
                    {{ csrf_field() }}
                    <select name="local" class="minimal" id="" onchange="this.form.submit()">
                        <option value="en" @if(app()->getLocale()==='en') selected @endif>English</option>
                        <option value="ru" @if(app()->getLocale()==='ru') selected @endif>Русский</option>
                    </select>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection
