<div class="ui borderless menu inverted right aligned top attached" style="border-radius: 0rem !important;">
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

    @if (strpos(Route::getCurrentRoute()->getPath(), 'home') !== FALSE)
    <div class="item" style="margin-left: 15rem;">
        <div class="ui search">
            <div class="ui icon input" style="width: 199%;">
                <input type="text" name="search_mrn" class="prompt" placeholder="Search Patient..." style="border-radius: 0.3rem;">
                <i class="search icon"></i>
            </div>
            <div class="results"></div>
        </div>
    </div>
    @endif

    <div class="right menu">
        <a class="left item" href="{{ route('/home') }}"><i class="icon dashboard"></i> Dashboard</a>
        <div class="ui left dropdown item">
            Welcome,&nbsp;&nbsp;&nbsp;
            <i class="user icon"></i> {{ Auth::user()->name }} <i class="dropdown icon"></i>
            <div class="menu">
                {{--<a class="item" href="{{ route('user.create') }}">Create User</a>
                <div class="ui divider"></div>
                <a class="item">Profile</a>
                <a class="item">Settings</a>--}}
                <a class="item" href="{{ route('create_user') }}">Create User</a>
                <a class="item" href="{{ url('/auth/logout') }}">Logout</a>
            </div>
        </div>
    </div>
</div>
@if (isset($record))
    <div class="ui menu right aligned attached">
        <div class="ui icon dropdown item">
            <i class="help icon"></i>
            <div class="menu">
                <div class="item"><i class="lock icon"></i>- Readonly Fields</div>
                <div class="item"><i class="write icon"></i>- Editable Fields</div>
                <div class="item">BCW - Before Call Work</div>
                <div class="item">ACW - After Call Work</div>
            </div>
        </div>
        <a class="item" href="{{ route('record.show', $record->id) }}">
            <i class="write icon"></i>
            Form
        </a>
        <a class="item" href="{{ route('callbacks', $record->id) }}">
            <i class="repeat icon"></i>
            Callbacks
        </a>
        <a class="item" href="{{ route('history', $record->id) }}">
            <i class="book icon"></i>
            Disposition History
        </a>

        <div class=" right menu">

            <div class="item">
                <div class="ui toggle checkbox">
                    <input type="radio" name="status" value="BCW" {!! Auth::user()->status == 'BCW'?'checked="checked"':'' !!}>
                    <label>BCW</label>
                </div>
            </div>

            <div class="item">
                <div class="ui toggle checkbox">
                    <input type="radio" name="status" value="INCALL" {!! Auth::user()->status == 'INCALL'?'checked="checked"':'' !!}>
                    <label>IN-CALL</label>
                </div>
            </div>

            <div class="bordered item">
                <div class="ui toggle checkbox">
                    <input type="radio" name="status" value="ACW" {!! Auth::user()->status == 'ACW'?'checked="checked"':'' !!}>
                    <label>ACW</label>
                </div>
            </div>

        </div>
    </div>
@endif


<script>
    $('.ui.dropdown').dropdown();

    @if (isset($record))
    $('.toggle.checkbox')
        .checkbox({
            // check all children
            onChecked: function() {
                $.get( "{{ URL::to('/') }}/user/update_status/{{ $record->id }}/" + $(this).val());
            },
            // uncheck all children
            onUnchecked: function() {

            }
        })
    ;
    @endif
</script>