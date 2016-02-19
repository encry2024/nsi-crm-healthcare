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
                        <a class="ui button">Form</a>
                        <a class="ui button" href="{{ route('callbacks', $record->id) }}">Callbacks</a>
                        <a class="ui button" href="{{ route('history', $record->id) }}">Disposition History</a>
                    </div>
                    <div class="ui secondary raised orange segment">
                        <form class="" action="{{ route('record.update', $record->id) }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PATCH">

                            <div class="ui form">
                                <div class="field @if($errors->has('btn')) error @endif">
                                    <label>First name <i class="asterisk icon"></i> </label>
                                    <div class="ui big left icon input">
                                        <input type="text" name="first_name" value="{{ $record->first_name }}" placeholder="First name" value="{{ Input::old('first_name') }}">
                                        <i class="info icon"></i>
                                    </div>
                                </div>

                                <div class="field @if($errors->has('btn')) error @endif">
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
                                    <div class="ui big left icon input">
                                        <textarea name="call_notes">{{ $record->call_notes }}</textarea>
                                        <i class="pencil icon"></i>
                                    </div>
                                </div>

                                <button class="ui button fluid">Update and Dispose</button>
                            </div>

                        </form>
                    </div>
                </div>

                {{--
                Tab 1 - Demographics
                Tab 2 - Breast Cancer Screening
                Tab 3 - Colon Cancer Screening
                Tab 4 - Flu Vaccination
                Tab 5 - Pneumonia Vaccination
                Tab 6 - Blood pressure
                Tab 7 - Diabetes: A1C
                Tab 8 - Diabetes: Eye exam
                Tab 9 - High Risk Meds
                Tab 10 Other
                --}}

                <div class="twelve wide column">
                    <div class="ui grid">

                        <div class="twelve wide stretched column">
                            <div class="row">
                                <h2 class="header">
                                    <div class="content">
                                        Diabetes: A1C
                                    </div>
                                </h2>
                            </div>

                            <div class="row">
                                <div class="ui divider"></div>
                            </div>

                            <div class="row">
                                <div class="ui basic segment">
                                    <form action="" class="ui form">
                                        <div class="field @if($errors->has('q1')) error @endif">
                                            <label for="q1" style="font-size: 16px;">1) History of diabetes?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q1" id="q1" checked="checked">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q1')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q1" id="q1">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q2')) error @endif">
                                            <label for="q2" style="font-size: 16px;">2) Date of recent PCP OV July-Dec 2015</label>
                                            <div class="ui big left icon input">
                                                <input name="q2" id="pcp_ov">
                                                <i class="calendar icon"></i>
                                            </div>

                                        </div>

                                        <div class="field @if($errors->has('q3')) error @endif">
                                            <label for="q3" style="font-size: 16px;">3) Date of most recent A1C</label>
                                            <div class="ui big left icon input">
                                                <i class="calendar icon"></i>
                                                <input name="q3" id="a1c">
                                            </div>

                                        </div>

                                        <div class="field @if($errors->has('q4')) error @endif">
                                            <label style="font-size: 16px;">4)  A1c Value</label>
                                            <div class="ui big left icon input">
                                                <input type="text" name="q4" >
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <label for="q5" style="font-size: 16px;">5) A1c Under Control <= 9</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q5" id="q5" checked="checked">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q5')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q5" id="q5">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q6')) error @endif">
                                            <label for="q6" style="font-size: 16px;">6) Most recent A1c < 8?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q6" id="q6" checked="checked">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q6')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q6" id="q6">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q7')) error @endif">
                                            <label for="q7" style="font-size: 16px;">7) If out of range or not done in past 6 months, was outreach made?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q7" id="q7" checked="checked">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q7')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q7" id="q7">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q8')) error @endif">
                                            <label for="q8" style="font-size: 16px;">8) Lab ordered?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q8" id="q8" checked="checked">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q8')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q8" id="q8">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q9')) error @endif">
                                            <label style="font-size: 16px;">9) Action taken?</label>
                                            <div class="ui big left icon input">
                                                <input type="text" name="q9" >
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q10')) error @endif">
                                            <label for="q10" style="font-size: 16px;">10) Closed loop: lab done?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q10" id="q10" checked="checked">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q10')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q10" id="q10">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q11')) error @endif">
                                            <label for="q11" style="font-size: 16px;">11) Closed loop: appt kept or task acted on/closed by office?</label>
                                            <div class="ui radio checkbox" style="margin-top: 0.5rem !important;">
                                                <input type="radio" name="q11" id="q11" checked="checked">
                                                <label>Yes</label>
                                            </div>
                                        </div>

                                        <div class="field @if($errors->has('q11')) error @endif">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="q11" id="q11">
                                                <label>No</label>
                                            </div>
                                        </div>

                                        <div class="ui divider"></div>

                                        <div class="actions">
                                            <button class="ui button primary fluid">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="four wide column">
                            <div class="ui vertical fluid right tabular menu" style="width: 81.5% !important;">
                                <a class="item" href="{{ route('record.show', $record->id) }}">
                                    Demographics
                                </a>
                                <a class="item" href="{{ route('bcs', $record->id) }}">
                                    Breast Cancer Screening
                                </a>
                                <a class="item" href="{{ route('ccs', $record->id) }}">
                                    Colon Cancer Screening
                                </a>
                                <a class="item" href="{{ route('fv', $record->id) }}">
                                    Flu Vaccination
                                </a>
                                <a class="item" href="{{ route('pv', $record->id) }}">
                                    Pneumonia Vaccination
                                </a>
                                <a class="item" href="{{ route('bp', $record->id) }}">
                                    Blood pressure
                                </a>
                                <a class="item" href="{{ route('da1c', $record->id) }}">
                                    Diabetes: A1C
                                </a>
                                <a class="active item">
                                    Diabetes: Eye Exam
                                </a>
                                <a class="item" href="{{ route('hrm', $record->id) }}">
                                    High Risk Meds
                                </a>
                                <a class="item" href="{{ route('o', $record->id) }}">
                                    Other
                                </a>
                            </div>
                            <div class="row">
                                <div class="ui secondary raised orange segment">
                                    <form class="" action="{{ url('record/' . $record->id . '/checklist') }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="ui form">
                                            <div class="field">
                                                <label>Other Checklist</label>
                                            </div>
                                            @foreach($record->checklist as $checklist)
                                                <div class="inline field">
                                                    <div class="ui checkbox">
                                                        <input type="checkbox" name="checklist[]" value="{{ $checklist->name }}" @if($checklist->checked != 0) checked="checked" @endif>
                                                        <label>{{ $checklist->description }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <button class="ui  button fluid">Update Checklist</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

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

        $("#pcp_ov").datepicker({
            format: 'MM dd, yyyy',
            autoclose: true
        });

        $("#a1c").datepicker({
            format: 'MM dd, yyyy',
            autoclose: true
        });

        $("#date_chart_review").datepicker({
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
