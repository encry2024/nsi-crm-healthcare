<div class="ui menu inverted right aligned top attached" style="border-radius: 0rem !important;">
    <div class="header item ">
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
    @if (isset($record))
    <div class="ui icon dropdown item borderless">
        <i class="help icon"></i>
        <span class="text">&nbsp;&nbsp;Help</span>
        <div class="menu">
            <div class="item"><i class="lock icon"></i>- Readonly Fields</div>
            <div class="item"><i class="write icon"></i>- Editable Fields</div>
            <div class="item">BCW - Before Call Work</div>
            <div class="item">ACW - After Call Work</div>
        </div>
    </div>

    <a class="item borderless" href="{{ route('record.show', $record->id) }}">
        <i class="write icon"></i>
        Form
    </a>

    <a class="item borderless" href="{{ route('callbacks', $record->id) }}">
        <i class="repeat icon"></i>
        Callbacks
    </a>

    <a class="item borderless" href="{{ route('history', $record->id) }}">
        <i class="book icon"></i>
        Disposition History
    </a>
    @endif

    @if (strpos(Route::getCurrentRoute()->getPath(), 'home') !== FALSE)
    <div class="item borderless" style="margin-left: 15rem;">
        <div class="ui search">
            <div class="ui icon input" style="width: 199%;">
                <input type="text" name="search_mrn" class="prompt" placeholder="Search Patient..." style="border-radius: 0.3rem;">
                <i class="search icon"></i>
            </div>
            <div class="results"></div>
        </div>
    </div>
    @endif

    <div class="right menu ">
        <a class="left item borderless" href="{{ route('/home') }}"><i class="icon dashboard"></i> Dashboard</a>
        <div class="ui left dropdown item borderless">
            Welcome,&nbsp;&nbsp;&nbsp;
            <i class="user icon"></i> {{ Auth::user()->name }} <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item break" href="#">Take a Break</a>
                <a class="item" href="{{ route('create_user') }}">Create User</a>
                <a class="item" href="{{ url('/auth/logout') }}">Logout</a>
            </div>
        </div>
    </div>
</div>
