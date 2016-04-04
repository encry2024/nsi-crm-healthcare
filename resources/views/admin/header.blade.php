<div class="ui stackable menu inverted" style="border-radius: 0px;">
    <div class="item">
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

    @if (strpos(Route::current()->getName(), 'admin_dashboard') !== FALSE)
        <div class="item borderless">
            <div class="ui search">
                <div class="ui icon input">
                    <input class="prompt" id="search_patient" type="text" placeholder="Search patient...">
                    <i class="search icon"></i>
                </div>
                <div class="results"></div>
            </div>
        </div>
    @endif

    <a class="ui right item borderless" href="{{ route('admin_dashboard') }}"><i class="icon dashboard"></i> Dashboard</a>
    <div class="ui dropdown item borderless">
        <i class="user icon"></i> {{ Auth::user()->name }} <i class="dropdown icon"></i>
        <div class="menu">
            <a class="item break" href="#">Take a Break</a>
            <a class="item" href="{{ route('create_user') }}">Create User</a>
            <a class="item" href="{{ url('/auth/logout') }}">Logout</a>
        </div>
    </div>
</div>
