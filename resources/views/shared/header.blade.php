<div class="header">
    <div class="header-text">{{Route::current()->getName()}}</div>
    <div class="header-right">
        <img class="header-logo" src="{{asset('images/gray_bell.svg')}}" width="25" height="25" alt="">
        <div class="header-username">{{Auth::user()->username}}</div>
        <img class="header-logo" src="{{asset('images/user.svg')}}" width="50" height="50" alt="">
    </div>
</div>
