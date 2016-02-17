@extends('template')


@section('header')
    @include('util.header')
@stop


@section('content')
    <div class="ui centered grid">

        <div class="nine wide column">
            <div class="twelve wide column grid " >

                @if (count($errors) > 0)
                    <div class="ui negative message">
                        <i class="close icon"></i>
                        <div class="header">
                            User was not able to save because of the following reason(s):
                        </div>
                        <ul class="list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('message'))
                    <div class="ui success message">
                        <i class="close icon"></i>
                        <div class="ui header">
                            <i class="check circle icon"></i>
                            <div class="content">
                                {{ Session::get('message') }}
                            </div>
                        </div>
                    </div>
                @endif

                <br>
                <h3 class="ui header">
                    <i class="large icons">
                        <i class="book icon"></i>
                        <i class="corner add icon"></i>
                    </i>
                    <div class="content">
                        Create record
                    </div>
                    <div class="ui divider"></div>
                </h3>

                <div class="ui grid">
                    <div class="sixteen wide column">
                        <form class="" action="{{ route('record.update', $record->id) }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PATCH">

                            <div class="ui form">
                                <div class="field @if($errors->has('btn')) error @endif">
                                    <label>BTN/Phone Number <i class="asterisk icon"></i> </label>
                                    <div class="ui left icon input">
                                        <input type="text" name="btn" value="{{ $record->btn }}" placeholder="BTN/Phone Number" value="{{ Input::old('btn') }}" readonly>
                                        <i class="phone icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('reference_no')) error @endif">
                                    <label>Reference Number <i class="asterisk icon"></i> </label>
                                    <div class="ui left icon input">
                                        <input type="text" name="reference_no" value="{{ $record->reference_no }}" placeholder="Reference Number" value="{{ Input::old('btn') }}">
                                        <i class="file text outline icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('date_of_birth')) error @endif">
                                    <label>Date of Birth <i class="asterisk icon"></i> </label>
                                    <div class="ui left icon input">
                                        <input name="date_of_birth" value="{{ date('F d, Y', strtotime($record->date_of_birth)) }}" placeholder="Date of Birth" id="dob">
                                        <i class="calendar icon"></i>
                                    </div>
                                </div>

                                <div class="field">
                                    <label>Call Disposition <i class="asterisk icon"></i> </label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="gender">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Call Disposition</div>
                                        <div class="menu">
                                            @foreach ($dispositions as $disposition)
                                                <div class="item" data-value="{{ $disposition->id }}">{{ $disposition->name }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('call_notes')) error @endif">
                                    <label>Call Note <i class="asterisk icon"></i> </label>
                                    <div class="ui left icon input">
                                        <textarea name="call_notes">{{ $record->call_notes }}</textarea>
                                        <i class="pencil icon"></i>
                                    </div>
                                </div>

                                <div class="ui buttons right floated">
                                    <a class="ui button negative" href="{{ route('/home') }}">Cancel</a>
                                    <div class="or"></div>
                                    <button class="ui positive button">Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    <script type="text/javascript">
        $("#dob").datepicker({
            format: 'MM dd, yyyy',
            autoclose: true
        });

        $('.dropdown').dropdown();

        $('.message .close').on('click', function()
        {
            $(this).closest('.message').transition('fade');
        });
    </script>
@stop
