<div class="ui borderless menu inverted right aligned" style="border-radius: 0rem !important;">
    <div class="header item">
        <h5 class="ui header inverted">
            <img src="{{ URL::to('/') }}/logo-nsi.png" class="ui mini image">
            <div class="content">
                CRM Healthcare
                <div class="sub header">
                    Northstar Solutions Incorporated
                </div>
            </div>
        </h5>
    </div>

{{--    <div class="item" style="margin-left: 15rem;">
        <div class="ui search">
            <div class="ui icon input" style="width: 199%;">
                <input type="text" class="prompt" placeholder="Search Patient..." style="border-radius: 0.3rem;">
                <i class="search icon"></i>
            </div>
            <div class="results"></div>
        </div>
    </div>--}}

    <div class="right menu">
        <a class="left item" href="{{ route('/home') }}"><i class="icon home"></i> Home</a>
        <div class="ui left dropdown item">
            Welcome,&nbsp;&nbsp;&nbsp;
            <i class="user icon"></i> {{ Auth::user()->name }} <i class="dropdown icon"></i>
            <div class="menu">
                {{--<a class="item" href="{{ route('user.create') }}">Create User</a>
                <div class="ui divider"></div>
                <a class="item">Profile</a>
                <a class="item">Settings</a>--}}
                <a class="item" href="{{ url('/auth/logout') }}">Logout</a>
            </div>
        </div>
    </div>
</div>

<script>
    $('.ui.dropdown').dropdown();
</script>