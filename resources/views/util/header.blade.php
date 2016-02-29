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
                {{--<a class="item" href="{{ route('user.create') }}">Create User</a>
                <div class="ui divider"></div>
                <a class="item">Profile</a>
                <a class="item">Settings</a>--}}
                <a class="item break" href="#">Take a Break</a>
                <a class="item" href="{{ route('create_user') }}">Create User</a>
                <a class="item" href="{{ url('/auth/logout') }}">Logout</a>
            </div>
        </div>
    </div>
</div>

@if(isset($record))
<div class="ui menu attached inverted blue">
    <a class="item {{Request::route()->getName()=='record.show'?'active':''}}" href="{{ route('record.show', $record->id) }}">
        Demographics
    </a>
    <a class="item {{Request::route()->getName()=='bcs'?'active':''}}" href="{{ route('bcs', $record->id) }}">
        Breast Cancer Screening
    </a>
    <a class="item {{Request::route()->getName()=='ccs'?'active':''}}" href="{{ route('ccs', $record->id) }}">
        Colon Cancer Screening
    </a>
    <a class="item {{Request::route()->getName()=='fv'?'active':''}}" href="{{ route('fv', $record->id) }}">
        Flu Vaccination
    </a>
    <a class="item {{Request::route()->getName()=='pv'?'active':''}}" href="{{ route('pv', $record->id) }}">
        Pneumonia Vaccination
    </a>
    <a class="item {{Request::route()->getName()=='bp'?'active':''}}" href="{{ route('bp', $record->id) }}">
        Blood pressure
    </a>
    <a class="item {{Request::route()->getName()=='da1c'?'active':''}}" href="{{ route('da1c', $record->id) }}">
        Diabetes: A1C
    </a>
    <a class="item {{Request::route()->getName()=='dee'?'active':''}}" href="{{ route('dee', $record->id) }}">
        Diabetes: Eye Exam
    </a>
    <a class="item {{Request::route()->getName()=='hrm'?'active':''}}" href="{{ route('hrm', $record->id) }}">
        High Risk Meds
    </a>
    <a class="item {{Request::route()->getName()=='o'?'active':''}}" href="{{ route('o', $record->id) }}">
        Other
    </a>
</div>
@endif