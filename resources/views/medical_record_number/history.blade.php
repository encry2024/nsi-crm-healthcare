@extends('template')


@section('header')
    @include('util.header')
@stop


@section('content')
    <div class="ui padded grid">

        <div class="sixteen wide column grid " >

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

            <div class="ui grid">
                <div class="four wide column">
                    <div class="ui buttons fluid">
                        <a class="ui button" href="{{ url('record/' . $record->id) }}">Form</a>
                        <a class="ui button" href="{{ route('callbacks', $record->id) }}">Callbacks</a>
                        <button class="ui button">Disposition History</button>
                    </div>
                    <div class="ui secondary raised orange segment">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PATCH">

                        <div class="ui form">
                            <div class="field @if($errors->has('first_name')) error @endif">
                                <label>First name <i class="asterisk icon"></i> </label>
                                <div class="ui big left icon input">
                                    <input type="text" name="first_name" value="{{ $record->first_name }}" placeholder="First name" value="{{ Input::old('first_name') }}">
                                    <i class="info icon"></i>
                                </div>
                            </div>

                            <div class="field @if($errors->has('last_name')) error @endif">
                                <label>Last name <i class="asterisk icon"></i> </label>
                                <div class="ui big left icon input">
                                    <input type="text" name="last_name" value="{{ $record->last_name }}" placeholder="Last name" value="{{ Input::old('last_name') }}">
                                    <i class="info icon"></i>
                                </div>
                            </div>

                            <div class="field @if($errors->has('btn')) error @endif">
                                <label>BTN/Phone Number <i class="asterisk icon"></i> </label>
                                <div class="ui big left icon input">
                                    <input type="text" name="btn" value="{{ $record->btn }}" placeholder="BTN/Phone Number" value="{{ Input::old('btn') }}">
                                    <i class="phone icon"></i>
                                </div>
                            </div>

                            <div class="field @if($errors->has('reference_no')) error @endif">
                                <label>Reference Number <i class="asterisk icon"></i> </label>
                                <div class="ui big left icon input">
                                    <input type="text" name="reference_no" value="{{ $record->reference_no }}" placeholder="Reference Number" value="{{ Input::old('reference_no') }}">
                                    <i class="file text outline icon"></i>
                                </div>
                            </div>

                            <div class="field @if($errors->has('date_of_birth')) error @endif">
                                <label>Date of Birth <i class="asterisk icon"></i> </label>
                                <div class="ui big left icon input">
                                    <input name="date_of_birth" value="{{ date('F d, Y', strtotime($record->date_of_birth)) }}" placeholder="Date of Birth" id="dob">
                                    <i class="calendar icon"></i>
                                </div>
                            </div>

                            <div class="field @if($errors->has('call_notes')) error @endif">
                                <label>Call Note <i class="asterisk icon"></i> </label>
                                <div class="ui big left icon input">
                                    <textarea name="call_notes">{{ $record->call_notes }}</textarea>
                                    <i class="pencil icon"></i>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="twelve wide column">
                    <div class="ui grid">

                        <div class="twelve wide stretched column">
                            <div class="row">
                                <h2 class="header">
                                    <div class="content">
                                        Callbacks
                                    </div>
                                </h2>
                            </div>

                            <div class="row">
                                <div class="ui divider"></div>
                            </div>

                            <div class="row">
                                <div class="ui basic segment">
                                    <table class="ui celled striped table">
                                        <thead>
                                        <tr><th colspan="3">
                                                Disposition History
                                            </th>
                                        </tr></thead>
                                        <tbody>
                                        @foreach($record->history as $history)
                                        <tr>
                                            <td>{{ $history->disposition->name }}</td>
                                            <td>{{ $history->created_at->toDayDateTimeString() }}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="ui modal">
        <i class="close icon"></i>
        <div class="header">
            Add Callback
        </div>
        <div class="content">
            <form class="" action="{{ url('record/1/callbacks') }}" method="POST" id="callback_form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="ui form">
                    <div class="fields">
                        <div class="eight wide field @if($errors->has('callback_date')) error @endif">
                            <label>Callback Date <i class="asterisk icon"></i> </label>
                            <div class="ui big left icon input">
                                <input name="callback_date" value="" placeholder="Callback Date" id="callback_date">
                                <i class="calendar icon"></i>
                            </div>
                        </div>
                        <div class="eight wide field">
                            <div class="two fields">
                                <div class="field">
                                    <label>Hour <i class="asterisk icon"></i> </label>
                                    <select class="ui fluid dropdown" name="callback_hour">
                                        @for($i=0;$i<=23;$i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="field">
                                    <label>Minutes <i class="asterisk icon"></i> </label>
                                    <select class="ui fluid dropdown" name="callback_minute">
                                    @for($i=0;$i<=59;$i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="actions">
            <div class="ui cancel button">Cancel</div>
            <button class="ui ok primary button" id="submit_callback">Submit</button>
        </div>
    </div>
@stop


@section('scripts')
    <script type="text/javascript">
        $("#dob").datepicker({
            format: 'MM dd, yyyy',
            autoclose: true
        });

        $("#v_d").datepicker({
            format: 'MM dd, yyyy',
            autoclose: true
        });

        $("#date_chart_review").datepicker({
            format: 'MM dd, yyyy',
            autoclose: true
        });

        $("#callback_date").datepicker({
            format: 'MM dd, yyyy',
            autoclose: true
        });

        $('.dropdown').dropdown();

        $('.message .close').on('click', function()
        {
            $(this).closest('.message').transition('fade');
        });

        $('#callback_modal').click(function(){
            $('.ui.modal').modal('show');
        });

        $('#submit_callback').click(function(){
            $('#callback_form').submit();
        });
    </script>
@stop
